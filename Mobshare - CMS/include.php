<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação:28/03/2019
    Conteudo Modificação: Criação de outras const
    Autor da Modificação: Leonardo
    Objetivo: Arquivo com constantes e funções para ser incluído em outros arquivos
*/

//Verificaa se o arquivo já foi importado
if(!isset($incluso)){
    
    //Set uma variável para verificar se o arquivo foi importado
    $incluso = true;

    //Constantes de Banco de dados
    define("SELECT","SELECT * FROM ");
    define("INSERT","INSERT INTO ");
    define("UPDATE","UPDATE ");
    define("DELETE","DELETE FROM ");

    define("ERRO_SCRIPT","Erro de script.<br>");
    define("SUCESSO_SCRIPT","Script executado com sucesso.<br>");

    //Constantes com o nome das tabelas
    define("TABELA_FUNCIONARIO", "Funcionario");
    define("TABELA_NIVEL", "Nivel");

    //Permissao de modulos cada módulo. Cada módulo terá 1 bit, se estiver ligado
    //significa que ele terá acesso ao módulo
    define("MODULO_FUNCIONARIO",0b1000000);
    define("MODULO_MARKETING",  0b0100000);
    define("MODULO_LOCACAO",    0b0010000);
    define("MODULO_PAGINA",     0b0001000);
    define("MODULO_APROVACAO",  0b0000100);
    define("MODULO_CONTATO",    0b0000010);
    define("MODULO_RELATORIO",  0b0000001);

    //Constantes com endereço da pasta para importar
    define("PASTA_RAIZ" , $_SERVER["DOCUMENT_ROOT"]);
    define("PASTA_PROJETO", "/Mobshare");

    //Import de conexão com o banco
    define("IMPORT_CONEXAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/conexaoMySQL.php");

    //Imports de nível
    define("IMPORT_NIVEL", PASTA_RAIZ . PASTA_PROJETO . "/model/nivelClass.php");
    define("IMPORT_NIVEL_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/nivelDAO.php");
    define("IMPORT_NIVEL_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerNivel.php");

    //Imports de funcionario
    define("IMPORT_FUNCIONARIO", PASTA_RAIZ . PASTA_PROJETO . "/model/funcionarioClass.php");
    define("IMPORT_FUNCIONARIO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/funcionarioDAO.php");
    define("IMPORT_FUNCIONARIO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerfuncionario.php");

    //Imports de páginas
    define("IMPORT_HOME", PASTA_RAIZ . PASTA_PROJETO . "/view/home.php");
    define("IMPORT_LOGIN", PASTA_RAIZ . PASTA_PROJETO . "/view/login.php");
    define("IMPORT_INDEX", PASTA_RAIZ . PASTA_PROJETO . "/index.php");

    //Import páginas de nível
    define("IMPORT_CADASTRO_NIVEL", PASTA_RAIZ . PASTA_PROJETO . "/view/nivel/nivel.php");

    //Import páginas de funcionario
    define("IMPORT_CADASTRO_FUNCIONARIO", PASTA_RAIZ . PASTA_PROJETO . "/view/funcionario/funcionario.php");

    //Essa função recebe o número de permissão e o número do módulo para
    //verificar se tem acesso ao módulo
    function acessoModulo($permissao, $modulo){
        //Retira as permissões dos módulos anteriores para comparar
        $permissaoModulo = $permissao % ($modulo*2);
        //Verificar se a permissão é maior ou igual ao módulo se for
        //ele tem acesso ao módulo(bit ligado)
        if($permissaoModulo >= $modulo){
            return true;
        }else{
            return false;
        }
    }
}
?>