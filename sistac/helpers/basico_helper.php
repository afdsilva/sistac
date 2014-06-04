<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');



/**
 * jTableStart
 * 
 * função que inicializa uma jTable para que se possa criar uma grid
 *  importante notar que é necessário
 * @param String $nome - da div
 * @param String $Title - Da tabela
 * @param String $URL_list - Endereço para a listagem da jTable exibida
 * @param String $URL_create - Endereço para que se envie os dados
 * @param String $URL_update - Endereço para que se envie a edição
 * @param String $URL_delete - Endereço para que se delete
 * @param Array() $configuracoes contendo as configurações inversas ao padrão (false), 
 *  veja os valores aceitos:
 *          {
 *              'selecting',
 *              'multiselect',
 *              'selectingCheckboxes',
 *              'sorting',
 *              'paging',
 *          }
 * @param String $paginationSize - Caso haja paginação,então deve ser informado o máximo
 * 
 * @return string 
 */
function jTableStart($nome = 'jPanel',$title='titulo', $URL_list = "blog/listaTodosPosts",$URL_create = 'blog/criarPost', $URL_update = "blog/atualizarPost",$URL_delete = "blog/deletarPost", $configuracoes = '', $paginationSize = '10'){
    $GLOBALS['tabelaNome'] = $nome;

    $baseurl = base_url();
    $jTableserverCommunicationError = lang('jTableserverCommunicationError');
    $jTableloadingMessage = lang('jTableloadingMessage');
    $jTablenoDataAvailable = lang('jTablenoDataAvailable');
    $jTableaddNewRecord = lang('jTableaddNewRecord');
    $jTableareYouSure = lang('jTableareYouSure');
    $jTableeditRecord = lang('jTableeditRecord');
    $jTabledeleteConfirmation = lang('jTabledeleteConfirmation');
    $jTablesave = lang('jTablesave');
    $jTablesaving = lang('jTablesaving');
    $jTablecancel = lang('jTablecancel');
    $jTabledeleteText = lang('jTabledeleteText');
    $jTabledeleting = lang('jTabledeleting');
    $jTableerror = lang('jTableerror');
    $jTableclose = lang('jTableclose');
    $jTablecannotLoadOptionsFor = lang('jTablecannotLoadOptionsFor');
    $jTablepagingInfo = lang('jTablepagingInfo');
    $jTablecanNotDeletedRecords = lang('jTablecanNotDeletedRecords');
    $jTabledeleteProggress =lang('jTabledeleteProggress');
    
    
    
    
    $retorno = "<div id=\"$nome\" style=\"font-size: 18px\"></div> ";
    $retorno = $retorno."
    <link href=\"$baseurl/static/jtable/themes/lightcolor/gray/jtable.css\" rel=\"stylesheet\" type=\"text/css\" />
    <script src=\"$baseurl/static/jtable/jquery.jtable.js\" type=\"text/javascript\"></script>";

    /**
     * Começa criar os campus 
     */    
    
    if(is_array($configuracoes)){
        if(in_array('selecting',$configuracoes)){
            $selecting = 'true';
        }else{
            $selecting = 'false';
        }
        if(in_array('multiselect',$configuracoes)){
            $multiselect = 'true';
        }else{
            $multiselect = 'false';
        }
        if(in_array('selectingCheckboxes',$configuracoes)){
            $selectingCheckboxes = 'true';
        }else{
            $selectingCheckboxes = 'false';
        }
        if(in_array('sorting',$configuracoes)){
            $sorting = 'true';
        }else{
            $sorting = 'false';
        }
        if(in_array('paging',$configuracoes)){
            $paging = 'true';
        }else{
            $paging = 'false';
        }
        
        
    }else{
        $multiselect = 'false';
        $selecting = 'false';
        $selectingCheckboxes = 'false';
        $sorting = 'false';
        $paging = 'false';
    }
    
    /**
     * Se não possúi nada então a opção está negada 
     */
    if($URL_delete != ''){
        $URL_delete = ",deleteAction: '$URL_delete'";
    }
    if($URL_update != ''){
        $URL_update = ",updateAction: '$URL_update'";
    }
    if($URL_create != ''){
        $URL_create = ",createAction: '$URL_create'";
    }
    
    $GLOBALS['temp'] = "<script>
    $(document).ready(function () {
        $('#$nome').jtable({
            title: '$title',
            messages: {
                    serverCommunicationError: '$jTableserverCommunicationError',
                    loadingMessage: '$jTableloadingMessage',
                    noDataAvailable: '$jTablenoDataAvailable',
                    addNewRecord: '$jTableaddNewRecord',
                    editRecord: '$jTableeditRecord',
                    areYouSure: '$jTableareYouSure',
                    deleteConfirmation: '$jTabledeleteConfirmation',
                    save: '$jTablesave',
                    saving: '$jTablesaving',
                    cancel: '$jTablecancel',
                    deleteText: '$jTabledeleteText',
                    deleting: '$jTabledeleting',
                    error: '$jTableerror',
                    close: '$jTableclose',
                    cannotLoadOptionsFor: '$jTablecannotLoadOptionsFor',
                    pagingInfo: '$jTablepagingInfo',
                    canNotDeletedRecords: '$jTablecanNotDeletedRecords',
                    deleteProggress: '$jTabledeleteProggress'
                },
            selecting: $selecting, //Enable selecting
            sorting: $sorting,
            paging:$paging,
            pageSize: $paginationSize,
            multiselect: $multiselect, //Allow multiple selecting
            selectingCheckboxes: $selectingCheckboxes, //Se está ou não marcado
            defaultSorting: 'id ASC',
            actions: {
                listAction: '$URL_list'
                $URL_create
                $URL_update
                $URL_delete
            },
            fields: {";
    
    
    
    
    return $retorno;
}

/**
 * jPanelAddID
 * 
 *  Campo exclusivo para a ID
 * @param Boolean $key
 * @param Boolean $create
 * @param Boolean $edit
 * @param Boolean $list 
 */
function jPanelAddID($key= true,$create= false,$edit= false,$list= false){
    if($key){
        $key = 'true';
    }else{
        $key = 'false';
    }
    
    if($create){
        $create = 'true';
    }else{
        $create = 'false';
    }
    if($edit){
        $edit = 'true';
    }else{
        $edit = 'false';
    }
    
    if($list){
        $list = 'true';
    }else{
        $list = 'false';
    }
     $GLOBALS['temp'] = $GLOBALS['temp']."id: {key: $key,create: $create,edit: $edit,list: $list}";
}

/**
 * jPanelAddCampo
 * 
 *  Adiciona um campo ao tabela jTable
 * @param String $campo     - Nome na tabela
 * @param String $titulo    - titulo que receberá
 * @param String $tipo      - tipo de mascaramento podendo ser
 *          {
 *              '',
 *              'textarea',
 *              'password'
 *          }
 * @param String $with      - O quanto ocupará da disposição
 * @param Boolean $list     - Se esse campo da tabela será listado
 */
function jPanelAddCampo($campo = 'descricao',$titulo = 'titulo', $tipo = '',$with = '20%',$list = true,$create = true, $edit=true){
    
    $GLOBALS['temp'] = $GLOBALS['temp'].",
                $campo: {
                    title: '$titulo',";
    if($tipo != ''){
         $GLOBALS['temp'] = $GLOBALS['temp']."type:'$tipo',";
    }
    if(!$list){
         $GLOBALS['temp'] = $GLOBALS['temp']."list:false,";
    }
    if(!$create){
         $GLOBALS['temp'] = $GLOBALS['temp']."create:false,";
    }
    if(!$edit){
         $GLOBALS['temp'] = $GLOBALS['temp']."edit:false,";
    }
    $GLOBALS['temp'] = $GLOBALS['temp']."
                    width: '$with'
                }
        ";
    
}

/**
 * jPanelAddCampoValMulti
 * 
 *  Adiciona um campo ao tabela jTable, entretanto esse permite
 *  que o campo seja escolhido como uma combo, checkbox e radiobutton
 * @param String $campo     - Nome na tabela
 * @param String $titulo    - titulo que receberá
 * @param String $tipo      - tipo de mascaramento podendo ser
 *          {
 *              '',
 *              'checkbox',
 *              'radiobutton'
 *          }
 * @param String || Array $value   - O endereço para carregar os valores ou um array com os valores
 * @param String $with      - O quanto ocupará da disposição
 * @param Boolean $list     - Se esse campo da tabela será listado
 */

function jPanelAddCampoValMulti($campo = 'descricao',$titulo = 'titulo',$tipo = '', $values = '',$with = '20%',$list = true,$create=true,$edit=true){
    if($values != ''){
        if(is_array($values)){
            $GLOBALS['temp'] = $GLOBALS['temp'].",
                    $campo: {
                        title: '$titulo',
                    ";

            $formatado = "{";
            foreach ($values as $key => $value) {
                $formatado = $formatado."'$key':'$value',";
            }
            $formatado = $formatado."}";
            $formatado = str_replace(',}', '}', $formatado);
            
            if($tipo == 'checkbox'){
                 $GLOBALS['temp'] =  $GLOBALS['temp']."values: $formatado,";
            }else{
                 $GLOBALS['temp'] =  $GLOBALS['temp']."options: $formatado,";
            }

            if($tipo != ''){
                $GLOBALS['temp'] = $GLOBALS['temp']."tipe:'$tipo',";
            }
            if(!$list){
                 $GLOBALS['temp'] = $GLOBALS['temp']."list:false,";
            }
            if(!$create){
                 $GLOBALS['temp'] = $GLOBALS['temp']."create:false,";
            }
            if(!$edit){
                 $GLOBALS['temp'] = $GLOBALS['temp']."edit:false,";
            }
            $GLOBALS['temp'] = $GLOBALS['temp']."
                        width: '$with'
                    }
            ";
        }else{
            $GLOBALS['temp'] = $GLOBALS['temp'].",
                    $campo: {
                        title: '$titulo',";
            $GLOBALS['temp'] = $GLOBALS['temp']."options: $formatado,";

            if($tipo != ''){
                $GLOBALS['temp'] = $GLOBALS['temp']."tipe:'$tipo',";
            }
            if (!$list) {
                $GLOBALS['temp'] = $GLOBALS['temp'] . "list:false,";
            }
            if (!$create) {
                $GLOBALS['temp'] = $GLOBALS['temp'] . "create:false,";
            }
            if (!$edit) {
                $GLOBALS['temp'] = $GLOBALS['temp'] . "edit:false,";
            }
            $GLOBALS['temp'] = $GLOBALS['temp']."
                        width: '$with'
                    }
            ";
        }
    }
    
    
}

/**
 * jPanelAddData
 *  adiciona uma DATA a tabela
 * 
 * @param String $campo     - Nome na tabela
 * @param String $titulo    - titulo que receberá
 * @param String $with      - O quanto ocupará da disposição
 * @param Boolean $list     - Se esse campo da tabela será listado
 */
function jPanelAddData($campo = 'descricao',$titulo = 'titulo',$with = '20%', $display='dd-mm-yy', $list = true,$create = true,$edit = true){
    $GLOBALS['temp'] = $GLOBALS['temp'].",
                $campo: {
                    title: '$titulo',
                    type: 'date',";
    if($display != ''){
         $GLOBALS['temp']  = $GLOBALS['temp'] ."displayFormat:'$display',";
    }
    if($list){
        $list = 'true';
    }else{
        $list ='false';
    }
    if($create){
        $create = 'true';
    }else{
        $create ='false';
    }
    if($edit){
        $edit = 'true';
    }else{
        $edit ='false';
    }
    $GLOBALS['temp'] =$GLOBALS['temp']."
                    width: '$with',
                    create: $create,
                    edit: $edit,
                    list: $list
                }
        ";
    
}

/**
 *jTableEnd
 *  funçao que finaliza a tabela
 * @return string 
 */
function jTableEnd(){
    $nome = $GLOBALS['tabelaNome'];
     $retorno = $GLOBALS['temp']."}
        });
        
        $('#$nome').jtable('load');
        
    });
             </script>";
    $GLOBALS['temp'] = '';
    return $retorno;
}
