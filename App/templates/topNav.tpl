<div class="navleft">
    {if $system_currentUser == null}
        {lang}system.main.welcome{/lang} <b>{lang}system.main.guest{/lang}</b>.
        <a href="{$system_path}Login">{lang}system.page.login{/lang}</a> |
        <a href="{$system_path}Register">{lang}system.page.register{/lang}</a>
    {else}
        {lang}system.main.welcome{/lang} <b>{$system_currentUser->getLogin()}</b>.

        <a href="{$system_path}User/Home">{lang}system.page.user{/lang}</a> |

        {if $system_userManager->hasPrivilege('system_admin')}
            <a href="{$system_path}Admin/Home">{lang}system.page.admin{/lang}</a> |
        {/if}

        <a href="{$system_path}Logout">{lang}system.page.logout{/lang}</a>
    {/if}
</div>
<div class="navright">
    <a class="blue" href="{$system_path}">Home</a>
    <a class="blue" href="{$system_path}News">News</a>

    {if $board_type == 'internal'}
        <a class="blue" href="{$system_path}Board">Board</a>
    {else}
        <a class="blue" href="{$system_path}{$board_link}">Board</a>
    {/if}

    <a class="blue" href="{$system_path}Wiki">Wiki</a>
    <a class="blue" href="ts3server://5.39.44.183">Teamspeak</a>
</div>