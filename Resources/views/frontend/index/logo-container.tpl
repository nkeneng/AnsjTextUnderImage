{extends file="parent:frontend/index/logo-container.tpl"}

{block name='frontend_index_logo'}

    {$smarty.block.parent}
    {if $ansjEnabled }
        <p style="font-size: {$ansjFont}px" id="ansj_greeting">{$ansjText}</p>
    {/if}

{/block}
