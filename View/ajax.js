function CriaRequest() {

     try{

         request = new XMLHttpRequest();        

     }catch (IEAtual){

          
 
         try{

             request = new ActiveXObject("Msxml2.XMLHTTP");       

         }catch(IEAntigo){

          

             try{

                 request = new ActiveXObject("Microsoft.XMLHTTP");          

             }catch(falha){

                 request = false;

             }

         }

     }
 
      

     if (!request) 

         alert("Seu Navegador não suporta Ajax!");

     else

         return request;

 }


function adicionar_familiar(){
    var tabela_familiar=document.getElementById('tabela_familiar');
    var nome_familiar=document.getElementById('nome_familiar').value;
    var sexo_familiar=document.getElementById('sexo_familiar').value;
    var parentesco=document.getElementById('parentesco').value;
    var idade_familiar=document.getElementById('idade_familiar').value;
    var escolaridade=document.getElementById('escolaridade_familiar').value;
    var renda_familiar=document.getElementById('renda_familiar').value;
    var profissao_familiar=document.getElementById('profissao_familiar').value;

    var item = "div_"+Math.random();

    tabela_familiar.innerHTML+=""+
            "<tr id='"+item+"'>"+
              "<td><input type='hidden' class='form-control' id='nome_familiar' name='nome_familiar[]' value='"+nome_familiar+"' > "+nome_familiar+"</td>"+
              "<td><input type='hidden' class='form-control' id='sexo_familiar' name='sexo_familiar[]' value='"+sexo_familiar+"' >"+sexo_familiar+"</td>"+
              "<td><input type='hidden' class='form-control' id='parentesco' name='parentesco[]' value='"+parentesco+"' >"+parentesco+"</td>"+
              "<td><input type='hidden' class='form-control' id='idade_familiar' name='idade_familiar[]' value='"+idade_familiar+"' >"+idade_familiar+"</td>"+
              "<td><input type='hidden' class='form-control' id='escolaridade_familiar' name='escolaridade_familiar[]'  value='"+escolaridade+"'>"+escolaridade+"</td>"+
              "<td><input type='hidden' class='form-control' id='renda_familiar' name='renda_familiar[]'  value='"+renda_familiar+"'>"+renda_familiar+"</td>"+
              "<td><input type='hidden' class='form-control' id='profissao_familiar' name='profissao_familiar[]'  value='"+profissao_familiar+"'>"+profissao_familiar+"</td>"+
              "<td><a class='btn btn-danger' onclick=remover_familiar('"+item+"');>Cancelar</a></td>"+
            "</tr>";

            
            document.getElementById('nome_familiar').value = "";
            document.getElementById('idade_familiar').value = "";
            document.getElementById('escolaridade_familiar').value = "";
            document.getElementById('renda_familiar').value = "";
  
}

function adicionar_familiar_editar(){
    var tabela_familiar=document.getElementById('tabela_familiar');
    var nome_familiar=document.getElementById('nome_familiar').value;
    var sexo_familiar=document.getElementById('sexo_familiar').value;
    var parentesco=document.getElementById('parentesco').value;
    var idade_familiar=document.getElementById('idade_familiar').value;
    var escolaridade=document.getElementById('escolaridade_familiar').value;
    var renda_familiar=document.getElementById('renda_familiar').value;
    var profissao_familiar=document.getElementById('profissao_familiar').value;

    var item = "div_"+Math.random();

    tabela_familiar.innerHTML+=""+
            "<tr id='"+item+"'>"+
              "<td><input type='hidden' class='form-control' id='nome_familiar' name='nome_familiar[]' value='"+nome_familiar+"' > "+nome_familiar+"</td>"+
              "<td><input type='hidden' class='form-control' id='sexo_familiar' name='sexo_familiar[]' value='"+sexo_familiar+"' >"+sexo_familiar+"</td>"+
              "<td><input type='hidden' class='form-control' id='parentesco' name='parentesco[]' value='"+parentesco+"' >"+parentesco+"</td>"+
              "<td><input type='hidden' class='form-control' id='idade_familiar' name='idade_familiar[]' value='"+idade_familiar+"' >"+idade_familiar+"</td>"+
              "<td><input type='hidden' class='form-control' id='escolaridade_familiar' name='escolaridade_familiar[]'  value='"+escolaridade+"'>"+escolaridade+"</td>"+
              "<td><input type='hidden' class='form-control' id='renda_familiar' name='renda_familiar[]'  value='"+renda_familiar+"'>"+renda_familiar+"</td>"+
              "<td><input type='hidden' class='form-control' id='profissao_familiar' name='profissao_familiar[]'  value='"+profissao_familiar+"'>"+profissao_familiar+"</td>"+
              "<td><a class='btn btn-danger' onclick=remover_familiar('"+item+"');>Cancelar</a></td>"+
            "</tr>";

            
            document.getElementById('nome_familiar').value = "";
            document.getElementById('idade_familiar').value = "";
            document.getElementById('escolaridade_familiar').value = "";
            document.getElementById('renda_familiar').value = "";
            document.getElementById('profissao_familiar').value = "";

  
}

function adicionar_beneficios_editar(id){
    var tabela_beneficios=document.getElementById('tabela_beneficios');
    var tempo_beneficio=document.getElementById('tempo_beneficio').value;
    var beneficios_objeto=document.getElementById('beneficios');


    
    var beneficios=beneficios_objeto.value;
   
    
    var option = beneficios_objeto.children[beneficios_objeto.selectedIndex];
    var nome_beneficios = option.textContent;

    var item = "div_"+beneficios;
    
    tabela_beneficios.innerHTML+=""+
            "<tr id='"+item+"'>"+
              "<td><input type='hidden' class='form-control' id='beneficios' name='beneficios[]' value='"+beneficios+"' > "+nome_beneficios+"</td>"+
              "<td><input type='hidden' class='form-control' id='tempo_beneficio' name='tempo_beneficio[]' value='"+tempo_beneficio+"' >"+tempo_beneficio+" Meses</td>"+
              "<td><a class='btn btn-danger' onclick=remover_beneficio('"+item+"',"+beneficios+");>Apagar</a></td>"+
            "</tr>"  
            //document.getElementById('tempo_beneficio').value = "";
    retirar_beneficio(beneficios); 
    
}

function adicionar_beneficios(){
    var tabela_beneficios=document.getElementById('tabela_beneficios');
    var tempo_beneficio=document.getElementById('tempo_beneficio').value;
    var beneficios_objeto=document.getElementById('beneficios');
    
    var beneficios=beneficios_objeto.value;    
    var option = beneficios_objeto.children[beneficios_objeto.selectedIndex];
    var nome_beneficios = option.textContent;

    var item = "div_"+beneficios;
    
    tabela_beneficios.innerHTML+=""+
            "<tr id='"+item+"'>"+ 
              "<td><input type='hidden' class='form-control' id='beneficios' name='beneficios[]' value='"+beneficios+"' > "+nome_beneficios+"</td>"+
              "<td><input type='hidden' class='form-control' id='tempo_beneficio' name='tempo_beneficio[]' value='"+tempo_beneficio+"' >"+tempo_beneficio+" Meses</td>"+
              "<td><a class='btn btn-danger' onclick=remover_beneficio('"+item+"',"+beneficios+");>Cancelar</a></td>"+
            "</tr>"  
            //document.getElementById('tempo_beneficio').value = "";
    retirar_beneficio(beneficios); 

}

function retirar_beneficio(idbeneficio){
    var result = document.getElementById('beneficios');
    result.options.length = 0;
     
        var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/validarBeneficio.php?beneficio="+idbeneficio, true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   result.innerHTML = xmlreq.responseText;
             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
   
}

function revalidar_beneficio(){
    var result = document.getElementById('beneficios');
    result.options.length = 0;
     
        var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/revalidarBeneficio.php", true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   result.innerHTML = xmlreq.responseText;
             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
   
}

function adicionar_beneficio_recebimento(){
    var tabela_beneficios=document.getElementById('tabela_beneficios');
    var beneficios_objeto=document.getElementById('beneficios');
    var data =document.getElementById('data_recebimento').value;
    
    var beneficios=beneficios_objeto.value;
   
    
    var option = beneficios_objeto.children[beneficios_objeto.selectedIndex];
    var nome_beneficios = option.textContent;

    var item = "div_"+beneficios;
    tabela_beneficios.innerHTML+=""+
            "<tr id='"+item+"'>"+
              "<td><input type='hidden' class='form-control' id='beneficios' name='beneficios[] 'value='"+beneficios+"' > "+nome_beneficios+"</td>"+
              "<td><input type='hidden' class='form-control' id='data_recebimento' name='data_recebimento[] 'value='"+data+"' > "+data+"</td>"+
              "<td><a class='btn btn-danger' onclick=remover_beneficio('"+item+"'); >Cancelar</a></td>"+
            "</tr>";

}

function remover_beneficio(itemid,id){
  var element = document.getElementById(itemid); // will return element
  element.parentNode.removeChild(element); // will remove the element from DOM

    var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/Apagar_beneficio_temporario.php?id="+id, true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   //result.innerHTML = xmlreq.responseText;

             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
    revalidar_beneficio();

}
function apagar_temporario(){
    var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/Apagar_temporario.php", true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   //result.innerHTML = xmlreq.responseText;

             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                //result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);

     

}

function remover_familiar(itemid){
  var element = document.getElementById(itemid); // will return element
  element.parentNode.removeChild(element); // will remove the element from DOM

}
function remover_beneficio2(id_beneficiario,id_beneficio){
    var result = document.getElementById('tabela_beneficios');
     
        var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/Apagar_beneficio.php?id_beneficiario="+id_beneficiario+"&id_beneficio="+id_beneficio, true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   //result.innerHTML = xmlreq.responseText;

             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
}

function remover_familiar_editar(id_beneficiario,id_familiar){
    var result = document.getElementById('tabela_familiar');

     
        var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/Apagar_familiar.php?id_familiar="+id_familiar+"&id_beneficiario="+id_beneficiario, true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   //result.innerHTML = xmlreq.responseText;

             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
}

function pesquisa_formulario(){

    var result = document.getElementById('resultado');
    var pesquisa = document.getElementById('pesquisa').value;
    var unidade = document.getElementById('unidade').value;
    var beneficio = document.getElementById('beneficio').value;
    var data_inicial = document.getElementById('data_inicial').value;
    var data_final = document.getElementById('data_final').value;
    var status = document.getElementById('status').value;
    var situacao = document.getElementById('situacao').value;

        result.innerHTML = "<img src='../images/carregando.gif'>";                 

        var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/Pesquisar_formulario.php?pesquisa="+pesquisa+"&unidade="+unidade+"&status="+status+"&data_inicial="+data_inicial+"&data_final="+data_final+"&situacao="+situacao+"&beneficio="+beneficio, true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   result.innerHTML = xmlreq.responseText;

             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
}

function pesquisa_usuario(){

    var result = document.getElementById('resultado');
    var pesquisa = document.getElementById('pesquisa').value;
    var unidade = document.getElementById('unidade').value;
    var status = document.getElementById('status').value;

        result.innerHTML = "<img src='../images/carregando.gif'>";  
        var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/Pesquisar_usuario.php?pesquisa="+pesquisa+"&unidade="+unidade+"&status="+status, true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   result.innerHTML = xmlreq.responseText;

             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
}

function mudar_status_beneficiario(id){

    var coluna = document.getElementById('status_beneficiario'+id);
    var status =document.getElementById('novo_status'+id).value;
    var id_beneficiario =id;


    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Mudar_status_beneficiario.php?id="+id+"&novo_status="+status, true);

    xmlreq.onreadystatechange = function(){
  
    if (xmlreq.readyState == 4) {
         if (xmlreq.status == 200) {
               result.innerHTML = xmlreq.responseText;

         }else{
               alert('Erro desconhecido, verifique sua conexão com a internet');

            result.innerHTML ="Erro ao receber mensagens";                 
         }
     }
    };
    xmlreq.send(null);

    if(status == 'DESATIVADO'){
        coluna.innerHTML=" ";
        coluna.innerHTML+="<form name='ativar"+id_beneficiario+"' method='GET'>"+
            "<input type='hidden' value='ATIVADO' id='novo_status"+id_beneficiario+"'  name='novo_status"+id_beneficiario+"'>"+
            "<input type='hidden' value="+id_beneficiario+" id='id' name='id'>"+
            "<button type='submit' class='btn btn-primary' onclick='mudar_status_beneficiario("+id_beneficiario+");'>ATIVAR</button>"+
            "</form>";
    }else{
        coluna.innerHTML=" ";
        coluna.innerHTML+="<form name='desativar"+id_beneficiario+"' method='GET'>"+
           "<input type='hidden' value='DESATIVADO' id='novo_status"+id_beneficiario+"' name='novo_status"+id_beneficiario+"'>"+
           "<input type='hidden' value="+id_beneficiario+" id='id' name='id'>"+
           "<button type='submit' class='btn btn-danger' onclick='mudar_status_beneficiario("+id_beneficiario+");' >DESATIVAR</button>"+
            "</form>";
    }
}

function mudar_status_usuario(id){

    var coluna = document.getElementById('status_usuario'+id);
    var status =document.getElementById('novo_status'+id).value;
    var id_usuario =id;


    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Mudar_status_usuario.php?id="+id+"&novo_status="+status, true);

    xmlreq.onreadystatechange = function(){
  
    if (xmlreq.readyState == 4) {
         if (xmlreq.status == 200) {
               result.innerHTML = xmlreq.responseText;

         }else{
               alert('Erro desconhecido, verifique sua conexão com a internet');

            result.innerHTML ="Erro ao receber mensagens";                 
         }
     }
    };
    xmlreq.send(null);

    if(status == 'DESATIVADO'){
        coluna.innerHTML=" ";
        coluna.innerHTML+="<form name='ativar"+id_usuario+"' method='GET'>"+
            "<input type='hidden' value='ATIVADO' id='novo_status"+id_usuario+"'  name='novo_status"+id_usuario+"'>"+
            "<input type='hidden' value="+id_usuario+" id='id' name='id'>"+
            "<button type='submit' class='btn btn-primary' onclick='mudar_status_usuario("+id_usuario+");'>ATIVAR</button>"+
            "</form>";
    }else{
        coluna.innerHTML=" ";
        coluna.innerHTML+="<form name='desativar"+id_usuario+"' method='GET'>"+
           "<input type='hidden' value='DESATIVADO' id='novo_status"+id_usuario+"' name='novo_status"+id_usuario+"'>"+
           "<input type='hidden' value="+id_usuario+" id='id' name='id'>"+
           "<button type='submit' class='btn btn-danger' onclick='mudar_status_usuario("+id_usuario+");' >DESATIVAR</button>"+
            "</form>";
    }  
}

function mudar_status_beneficio(id){

    var coluna = document.getElementById('status_beneficio'+id);
    var status =document.getElementById('novo_status'+id).value;
    var id_beneficio =id;


    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Mudar_status_beneficio.php?id="+id+"&novo_status="+status, true);

    xmlreq.onreadystatechange = function(){
  
    if (xmlreq.readyState == 4) {
         if (xmlreq.status == 200) {
               result.innerHTML = xmlreq.responseText;

         }else{
               alert('Erro desconhecido, verifique sua conexão com a internet');

            result.innerHTML ="Erro ao receber mensagens";                 
         }
     }
    };
    xmlreq.send(null);

    if(status == 'DESATIVADO'){
        coluna.innerHTML=" ";
        coluna.innerHTML+="<form name='ativar"+id_beneficio+"' method='GET'>"+
            "<input type='hidden' value='ATIVADO' id='novo_status"+id_beneficio+"'  name='novo_status"+id_beneficio+"'>"+
            "<input type='hidden' value="+id_beneficio+" id='id' name='id'>"+
            "<button type='submit' class='btn btn-primary' onclick='mudar_status_beneficio("+id_beneficio+");'>ATIVAR</button>"+
            "</form>";
    }else{
        coluna.innerHTML=" ";
        coluna.innerHTML+="<form name='desativar"+id_beneficio+"' method='GET'>"+
           "<input type='hidden' value='DESATIVADO' id='novo_status"+id_beneficio+"' name='novo_status"+id_beneficio+"'>"+
           "<input type='hidden' value="+id_beneficio+" id='id' name='id'>"+
           "<button type='submit' class='btn btn-danger' onclick='mudar_status_beneficio("+id_beneficio+");' >DESATIVAR</button>"+
            "</form>";
    }  
}

function mudar_status_unidade(id){

    var coluna = document.getElementById('status_unidade'+id);
    var status =document.getElementById('novo_status'+id).value;
    var id_unidade =id;


    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Mudar_status_unidade.php?id="+id+"&novo_status="+status, true);

    xmlreq.onreadystatechange = function(){
  
    if (xmlreq.readyState == 4) {
         if (xmlreq.status == 200) {
               result.innerHTML = xmlreq.responseText;

         }else{
               alert('Erro desconhecido, verifique sua conexão com a internet');

            result.innerHTML ="Erro ao receber mensagens";                 
         }
     }
    };
    xmlreq.send(null);

    if(status == 'DESATIVADO'){
        coluna.innerHTML=" ";
        coluna.innerHTML+="<form name='ativar"+ id_unidade+"' method='GET'>"+
            "<input type='hidden' value='ATIVADO' id='novo_status"+ id_unidade+"'  name='novo_status"+ id_unidade+"'>"+
            "<input type='hidden' value="+ id_unidade+" id='id' name='id'>"+
            "<button type='submit' class='btn btn-primary' onclick='mudar_status_unidade("+ id_unidade+");'>ATIVAR</button>"+
            "</form>";
    }else{
        coluna.innerHTML=" ";
        coluna.innerHTML+="<form name='desativar"+id_unidade+"' method='GET'>"+
           "<input type='hidden' value='DESATIVADO' id='novo_status"+id_unidade+"' name='novo_status"+id_unidade+"'>"+
           "<input type='hidden' value="+id_unidade+" id='id' name='id'>"+
           "<button type='submit' class='btn btn-danger' onclick='mudar_status_unidade("+id_unidade+");' >DESATIVAR</button>"+
            "</form>";
    }  
}

function pesquisa_recebimento(){
    var result = document.getElementById('resultado');
    var id = document.getElementById('id').value; 
    var beneficio = document.getElementById('beneficio').value; 
    var data_inicial = document.getElementById('data_inicial').value;
    var data_final = document.getElementById('data_final').value;
     
        var xmlreq = CriaRequest();
        xmlreq.open("GET", "../Controller/Pesquisar_recebimento.php?id="+id+"&beneficio="+beneficio+"&data_inicial="+data_inicial+"&data_final="+data_final, true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   result.innerHTML = xmlreq.responseText;

             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
}

function adicionar_recebimento(){

    var id = document.getElementById('id').value; 
     
        var xmlreq = CriaRequest();
        xmlreq.open("POST", "adicionar_recebimento.php?id="+id, true);

        xmlreq.onreadystatechange = function(){
      
         if (xmlreq.readyState == 4) {
             if (xmlreq.status == 200) {
                   result.innerHTML = xmlreq.responseText;

             }else{
                   alert('Erro desconhecido, verifique sua conexão com a internet');

                result.innerHTML ="Erro ao receber mensagens";                 
             }
         }
        };
     xmlreq.send(null);
}




