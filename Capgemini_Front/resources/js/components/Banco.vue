<template>
    <div>
        
        <h3>Banco Capgemini</h3>
        <div class="row">
          
           <div class="col-md-4">
                
                <div class="card" v-if="dados_conta == null">
                    
                    <div class="card-body">
                    	<h4>Acessar</h4>
                    	<!-- 
                        <div class="row">          
            				<div class="col-md-12 form-group">
            					<label>Chave de acesso</label>
            					<input type="text" class="form-control">
            				</div>
            			</div>
            			<div class="text-center">Ou</div> -->
            			
            			<div class="row">          
            				<div class="col-md-6 form-group">
            					<label>Agência</label>
            					<input type="text" class="form-control" v-model="formulario.agencia" v-mask="'####-#'">
            				</div>
            			          
            				<div class="col-md-6 form-group">
            					<label>Conta</label>
            					<input type="text" class="form-control" v-model="formulario.conta" v-mask="'######-#'">
            				</div>
            			</div>
            			
            			<div class="row">          
            				<div class="col-md-12 form-group">
            					<label>Senha</label>
            					<input type="password" class="form-control" v-model="formulario.senha">
            				</div>
            			</div>
            			
            			<div class="row">          
            				<div class="col-md-12 form-group">
            					<button type="button" class="btn btn-primary" @click="acessar()">Acessar</button>
            				</div>
            			</div>
                    </div>
                </div>
                
                <div class="card mt-2" v-if="dados_conta != null">
                    
                    <div class="card-body">
                    	<small>Cliente: </small><br>
                    	<h5>{{ dados_conta.nome_cliente }}</h5>
                    	
                    	<div class="row">          
            				<div class="col-md-12">
            				
		                    	<small>Agência: </small><br>{{ dados_conta.agencia + '-'+ dados_conta.agencia_digito }}
		                    	<br>
		                    	<small>Conta: </small><br>{{ dados_conta.conta + '-'+ dados_conta.conta_digito }}
	                    	</div>
                    	</div>
                    	
                         
                        
                        <div class="row mt-2">          
            				<div class="col-md-12 form-group">
            					<button type="button" class="btn btn-primary" @click="sair()">Sair</button>
            				</div>
            			</div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-md-8">
               
                <div class="card" v-if="dados_conta == null">
                    <div class="card-body">
						<h5>Nenhuma conta informada. Para ter acesso informe os dados da conta ao lado.</h5>
						
						Conta 1:<br>
						agencia: 1159-1<br>
    					conta: 123456-2<br>
    					senha: 543210<br>
						<br>
						Conta2:<br>
						agencia: 2248-2<br>
    					conta: 456789-3<br>
    					senha: 987654<br>
    					
            		</div>
        		</div>		
                
                <template v-if="dados_conta != null">
	                <div class="card">
	                    <div class="card-body">
	                        <div class="row">          
	            				<div class="col-md-12">
	            					<div class="alert alert-primary">
		            					<h5>Saldo R$ 
			            					
			            					{{ formataValor( dados_conta.saldo ) }}
			            					
		            					</h5>
	            					</div>
	            					
	            					
	            					<h5>Lançamentos</h5>
	            					<div class="overflow-auto">
		            					<table class="table">
		            						<thead>
		            							<tr>
		            								<th>Data</th>
		            								<th>Operação</th>
		            								<th class="text-right">R$</th>
		            							</tr>
		            						</thead>
		            						<tbody>
		            							<tr	v-if="dados_conta.lancamentos.length == 0">
		            								<td colspan="3" class="text-center">Nenhum lançamento realizado.</td>
		            							</tr>
		            							<tr v-for="lancamento in dados_conta.lancamentos">
		            								<td>{{ formataData( lancamento.created_at ) }}</td>
		            								<td>{{ lancamento.operacao }}</td>
		            								<td class="text-right">
		            								<span v-if="lancamento.operacao == 'SAQUE'" class="text-danger">
		            								- {{ formataValor( lancamento.valor) }}
		            								</span>
		            								<span v-else class="text-primary">
		            								{{ formataValor( lancamento.valor ) }}
		            								</span>
		            								</td>
		            							</tr>
		            						</tbody>
		            					</table>
	            					</div>
	            				</div>
	           				</div>
	           				
	           			</div>
					</div>
						
					<div class="card mt-2">
	                  	<div class="card-body">
	                        <div class="row">          
	            				<div class="col-md-6">
	            					<h5>Depósito R$</h5>
	            					
	            					<div class="row">          
			            				<div class="col-md-12 form-group">
			            					
			            					<input type="text" class="form-control" v-mask="'#####.##'" v-model="formulario.valor_deposito">
			            				</div>
			            			</div>
			            			
			            			<div class="row">          
			            				<div class="col-md-12 form-group">
			            					<button type="button" class="btn btn-primary" @click="depositar()">Depositar</button>
			            				</div>
			            			</div>
	            				</div>
	            				
	            				<div class="col-md-6">
	            					<h5>Saque R$</h5>
	            					
	            					<div class="row">          
			            				<div class="col-md-12 form-group">
			            					
			            					<input type="text" class="form-control" v-mask="'#####.##'" v-model="formulario.valor_saque">
			            				</div>
			            			</div>
			            			
			            			<div class="row">          
			            				<div class="col-md-12 form-group">
			            					<button type="button" class="btn btn-primary" @click="sacar()">Sacar</button>
			            				</div>
			            			</div>
	            				</div>
	           				</div>
	                 	</div>
	                 </div>
	                 
	                 
                </template>
            </div>
            
            
            
        </div>
    </div>
</template>

<script>
    export default {
    	props: [],

        data() {
            return {
            	servidor: 'http://localhost:8080/api',
            	formulario: {
            		chave_cliente: '',
	            	agencia: '',
	            	conta: '',
	            	senha: ''
            	},            	
            	dados_conta: null
            }
        },        
        computed: {
           
        },
        methods: {
        	formataData(data) {
        		return data.substr(8, 2) + '/' + data.substr(5, 2) + '/' + data.substr(0, 4);
        		
        		if(data != '' && data != undefined && data != null){                    
                    return data.substr(8, 2) + '/' + data.substr(5, 2) + '/' + data.substr(0, 4) + ' ' + data.substr(10);
                } else {
                    return '';
                }
        	},
        	formataValor(valor) {        		
        		return parseFloat(valor).toFixed(2).replace('.', ',');
        	},
            acessar() {
            	spinner('open');
            	this.dados_conta = null;            

            	$.get(this.servidor + '/buscarConta', this.formulario, (data) => {
            		if(data.status == 'erro') {
            			toastr['error'](data.mensagem);
            		} else {
            			this.dados_conta = data.dados;            			
            			this.formulario.chave_cliente = this.dados_conta.chave_cliente;
            		}
            	}).fail(function(data) {                    
                    if(data.status == 419){
                        window.location = '/';
                    }   
                    toastr['error'](data);
                }).always(() => {
            		spinner('close');
            	});
            	
                
            },
			sair() {
            	this.dados_conta = null;
            },
			depositar() {
            	if(! this.dados_conta ){
            		toastr['error']('Você precisa está logado');
            	}
            	spinner('open');
            	$.post(this.servidor + '/deposito', this.formulario, (data) => {
            		if(data.status == 'erro') {
            			toastr['error'](data.mensagem);
            		} else {
            			toastr['success'](data.mensagem);
            			this.dados_conta = data.dados;
            			this.formulario.valor_deposito = '';
            		}
            	}).fail(function(data) {                    
                    if(data.status == 419){
                        window.location = '/';
                    }   
                    toastr['error'](data);
                }).always(() => {
            		spinner('close');
            	});
            },
			sacar() {
            	if(! this.dados_conta ){
            		toastr['error']('Você precisa está logado');
            	}
            	spinner('open');
            	$.post(this.servidor + '/saque', this.formulario, (data) => {
            		if(data.status == 'erro') {
            			toastr['error'](data.mensagem);
            		} else {
            			toastr['success'](data.mensagem);
            			this.dados_conta = data.dados;
            			this.formulario.valor_saque = '';
            		}
            	}).fail(function(data) {                    
                    if(data.status == 419){
                        window.location = '/';
                    }   
                    toastr['error'](data);
                }).always(() => {
            		spinner('close');
            	});
            }
        },        

        mounted() {
        }
    }
</script>
