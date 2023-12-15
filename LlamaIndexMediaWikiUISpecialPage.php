<?php
class LlamaIndexMediaWikiUISpecialPage extends SpecialPage {
    function __construct() {
        parent::__construct( 'LlamaIndexMediaWikiUI' );
    }

    function execute( $par ) {
        global $egLlamaIndexMediaWikiServiceURL;
        $out = $this->getOutput();
        $out->addJsConfigVars('egLlamaIndexMediaWikiServiceURL', $egLlamaIndexMediaWikiServiceURL);
        $this->setHeaders();
        $out->addModules('ext.LlamaIndexMediaWikiUIJS');

        $html = <<<HTML
<div class="llama-container">
    <h1>AI</h1>
    <input type="text" id="queryInput" class="llama-input" placeholder="Enter your query">
    <button id="submitButton" class="llama-btn">Submit</button>
    <div id="responseArea" class="llama-response"></div>
    <div id="loadingBar" class="llama-loading" style="display:none;"></div>
</div>
HTML;

        $out->addHTML( $html );
        $out->addInlineStyle( '.llama-container { text-align: center; margin-top: 20px; }'
                            . '.llama-input { padding: 10px; width: 300px; margin-bottom: 10px; }'
                            . '.llama-btn { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }'
                            . '.llama-btn:hover { background-color: #45a049; }'
                            . '.llama-response { margin-top: 20px; padding: 10px; border: 1px solid #ddd; min-height: 50px; }'
                            . '.llama-loading { border: 4px solid #f3f3f3; border-radius: 50%; border-top: 4px solid #3498db; width: 40px; height: 40px; -webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; margin: auto; }'
                            . '@-webkit-keyframes spin { 0% { -webkit-transform: rotate(0deg); } 100% { -webkit-transform: rotate(360deg); } }'
                            . '@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }' );
    }
}