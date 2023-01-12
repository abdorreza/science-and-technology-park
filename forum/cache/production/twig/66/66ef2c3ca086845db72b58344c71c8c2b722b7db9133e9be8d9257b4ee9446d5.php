<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* navbar_header.html */
class __TwigTemplate_3ecb9375c8a0d7f55766a343a0dd73ec1cac85ca51aa8eb452cfedc966b931d2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div id=\"navbar-main\" class=\"navbar navbar-main\" data-current-page=\"";
        if ($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "NAV_SECTION", [])) {
            echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "NAV_SECTION", []);
        } else {
            echo (isset($context["SCRIPT_NAME"]) ? $context["SCRIPT_NAME"] : null);
        }
        echo "\" role=\"navigation\">
\t<div class=\"inner\">

\t\t<ul id=\"nav-main\" class=\"nav-main linklist\" role=\"menubar\">
\t\t\t<li id=\"quick-links\" class=\"quick-links dropdown-container responsive-menu";
        // line 5
        if (( !(isset($context["S_DISPLAY_QUICK_LINKS"]) ? $context["S_DISPLAY_QUICK_LINKS"] : null) &&  !(isset($context["S_DISPLAY_SEARCH"]) ? $context["S_DISPLAY_SEARCH"] : null))) {
            echo " hidden";
        }
        echo "\" data-skip-responsive=\"true\">
\t\t\t\t<a href=\"#\" class=\"dropdown-trigger\" title=\"";
        // line 6
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("QUICK_LINKS");
        echo "\">
\t\t\t\t\t<i class=\"icon fa-bars fa-fw\" aria-hidden=\"true\"></i><span>";
        // line 7
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("QUICK_LINKS");
        echo "</span>
\t\t\t\t</a>
\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">
\t\t\t\t\t\t";
        // line 12
        // line 13
        echo "
\t\t\t\t\t\t";
        // line 14
        if ((isset($context["S_DISPLAY_SEARCH"]) ? $context["S_DISPLAY_SEARCH"] : null)) {
            // line 15
            echo "\t\t\t\t\t\t\t<li class=\"separator\"></li>
\t\t\t\t\t\t\t";
            // line 16
            if ((isset($context["S_REGISTERED_USER"]) ? $context["S_REGISTERED_USER"] : null)) {
                // line 17
                echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 18
                echo (isset($context["U_SEARCH_SELF"]) ? $context["U_SEARCH_SELF"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_SELF");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-gray\" aria-hidden=\"true\"></i><span>";
                // line 19
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_SELF");
                echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
            }
            // line 23
            echo "\t\t\t\t\t\t\t";
            if ((isset($context["S_USER_LOGGED_IN"]) ? $context["S_USER_LOGGED_IN"] : null)) {
                // line 24
                echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 25
                echo (isset($context["U_SEARCH_NEW"]) ? $context["U_SEARCH_NEW"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_NEW");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-red\" aria-hidden=\"true\"></i><span>";
                // line 26
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_NEW");
                echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
            }
            // line 30
            echo "\t\t\t\t\t\t\t";
            if ((isset($context["S_LOAD_UNREADS"]) ? $context["S_LOAD_UNREADS"] : null)) {
                // line 31
                echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 32
                echo (isset($context["U_SEARCH_UNREAD"]) ? $context["U_SEARCH_UNREAD"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_UNREAD");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-red\" aria-hidden=\"true\"></i><span>";
                // line 33
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_UNREAD");
                echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
            }
            // line 37
            echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 38
            echo (isset($context["U_SEARCH_UNANSWERED"]) ? $context["U_SEARCH_UNANSWERED"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_UNANSWERED");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-gray\" aria-hidden=\"true\"></i><span>";
            // line 39
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_UNANSWERED");
            echo "</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 43
            echo (isset($context["U_SEARCH_ACTIVE_TOPICS"]) ? $context["U_SEARCH_ACTIVE_TOPICS"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ACTIVE_TOPICS");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-blue\" aria-hidden=\"true\"></i><span>";
            // line 44
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ACTIVE_TOPICS");
            echo "</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t\t\t<li class=\"separator\"></li>

\t\t\t\t\t\t";
        // line 50
        // line 51
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</li>

\t\t\t";
        // line 55
        if ((isset($context["U_SITE_HOME"]) ? $context["U_SITE_HOME"] : null)) {
            // line 56
            echo "\t\t\t\t<li class=\"home\">
\t\t\t\t\t<a href=\"";
            // line 57
            echo (isset($context["U_SITE_HOME"]) ? $context["U_SITE_HOME"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SITE_HOME");
            echo "\" data-navbar-reference=\"home\">
\t\t\t\t\t\t<i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 58
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SITE_HOME");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 62
        echo "\t\t\t<li class=\"forums selected\">
\t\t\t\t<a href=\"";
        // line 63
        echo (isset($context["U_INDEX"]) ? $context["U_INDEX"] : null);
        echo "\" title=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUMS");
        echo "\">
\t\t\t\t\t<i class=\"icon fa-comment fa-fw\" aria-hidden=\"true\"></i><span>";
        // line 64
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUMS");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        // line 67
        if (( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null) && ((isset($context["S_DISPLAY_MEMBERLIST"]) ? $context["S_DISPLAY_MEMBERLIST"] : null) || (isset($context["U_TEAM"]) ? $context["U_TEAM"] : null)))) {
            // line 68
            echo "\t\t\t\t<li class=\"members dropdown-container\" data-skip-responsive=\"true\" data-select-match=\"member\">
\t\t\t\t\t<a class=\"dropdown-trigger\" href=\"";
            // line 69
            echo (isset($context["U_MEMBERLIST"]) ? $context["U_MEMBERLIST"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MEMBERLIST");
            echo "\">
\t\t\t\t\t\t<i class=\"icon fa-group fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 70
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MEMBERLIST");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">
\t\t\t\t\t\t\t";
            // line 75
            if ((isset($context["S_DISPLAY_MEMBERLIST"]) ? $context["S_DISPLAY_MEMBERLIST"] : null)) {
                // line 76
                echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 77
                echo (isset($context["U_MEMBERLIST"]) ? $context["U_MEMBERLIST"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MEMBERLIST");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-group fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 78
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MEMBERLIST");
                echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
            }
            // line 82
            echo "\t\t\t\t\t\t\t";
            if ((isset($context["U_TEAM"]) ? $context["U_TEAM"] : null)) {
                // line 83
                echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 84
                echo (isset($context["U_TEAM"]) ? $context["U_TEAM"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("THE_TEAM");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-shield fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 85
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("THE_TEAM");
                echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
            }
            // line 89
            echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t";
        }
        // line 93
        echo "
\t\t\t";
        // line 94
        if ((isset($context["S_REGISTERED_USER"]) ? $context["S_REGISTERED_USER"] : null)) {
            // line 95
            echo "\t\t\t\t";
            // line 96
            echo "\t\t\t\t<li id=\"username_logged_in\" class=\"rightside account\" data-skip-responsive=\"true\" data-select-match=\"ucp\">
\t\t\t\t\t";
            // line 97
            // line 98
            echo "\t\t\t\t\t<div class=\"header-profile dropdown-container\">
\t\t\t\t\t\t<a class=\"header-avatar dropdown-trigger\" href=\"";
            // line 99
            echo (isset($context["U_PROFILE"]) ? $context["U_PROFILE"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PROFILE");
            echo "\">";
            if ((isset($context["CURRENT_USER_AVATAR"]) ? $context["CURRENT_USER_AVATAR"] : null)) {
                echo (isset($context["CURRENT_USER_AVATAR"]) ? $context["CURRENT_USER_AVATAR"] : null);
                echo " ";
            }
            echo " ";
            echo (isset($context["CURRENT_USERNAME_SIMPLE"]) ? $context["CURRENT_USERNAME_SIMPLE"] : null);
            echo "</a>
\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">
\t\t\t\t\t\t\t\t";
            // line 103
            if ((isset($context["U_RESTORE_PERMISSIONS"]) ? $context["U_RESTORE_PERMISSIONS"] : null)) {
                // line 104
                echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 105
                echo (isset($context["U_RESTORE_PERMISSIONS"]) ? $context["U_RESTORE_PERMISSIONS"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-refresh fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 106
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESTORE_PERMISSIONS");
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 110
            echo "
\t\t\t\t\t\t\t\t";
            // line 111
            // line 112
            echo "
\t\t\t\t\t\t\t\t";
            // line 113
            if ((isset($context["U_USER_PROFILE"]) ? $context["U_USER_PROFILE"] : null)) {
                // line 114
                echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 115
                echo (isset($context["U_USER_PROFILE"]) ? $context["U_USER_PROFILE"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("READ_PROFILE");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-user fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 116
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("READ_PROFILE");
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 120
            echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 121
            echo (isset($context["U_PROFILE"]) ? $context["U_PROFILE"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PROFILE");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-sliders fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 122
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PROFILE");
            echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t";
            // line 126
            // line 127
            echo "
\t\t\t\t\t\t\t\t<li class=\"separator\"></li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 130
            echo (isset($context["U_LOGIN_LOGOUT"]) ? $context["U_LOGIN_LOGOUT"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "\" accesskey=\"x\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-power-off fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 131
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
            // line 137
            // line 138
            echo "\t\t\t\t</li>
\t\t\t\t";
            // line 139
            if ((isset($context["S_DISPLAY_PM"]) ? $context["S_DISPLAY_PM"] : null)) {
                // line 140
                echo "\t\t\t\t\t<li class=\"rightside pm\" data-skip-responsive=\"true\" data-select-match=\"pm\">
\t\t\t\t\t\t<a href=\"";
                // line 141
                echo (isset($context["U_PRIVATEMSGS"]) ? $context["U_PRIVATEMSGS"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PRIVATE_MESSAGES");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t<i class=\"icon fa-inbox fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 142
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PRIVATE_MESSAGES");
                echo "</span>
\t\t\t\t\t\t\t<strong class=\"badge";
                // line 143
                if ( !(isset($context["PRIVATE_MESSAGE_COUNT"]) ? $context["PRIVATE_MESSAGE_COUNT"] : null)) {
                    echo " hidden";
                }
                echo "\">
\t\t\t\t\t\t\t\t<span class=\"counter\">";
                // line 144
                echo (isset($context["PRIVATE_MESSAGE_COUNT"]) ? $context["PRIVATE_MESSAGE_COUNT"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t<span class=\"arrow\"></span>
\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 150
            echo "\t\t\t\t";
            if ((isset($context["S_NOTIFICATIONS_DISPLAY"]) ? $context["S_NOTIFICATIONS_DISPLAY"] : null)) {
                // line 151
                echo "\t\t\t\t\t<li class=\"rightside notifications dropdown-container dropdown-";
                echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
                echo "\" data-skip-responsive=\"true\" data-select-match=\"notifications\">
\t\t\t\t\t\t<a href=\"";
                // line 152
                echo (isset($context["U_VIEW_ALL_NOTIFICATIONS"]) ? $context["U_VIEW_ALL_NOTIFICATIONS"] : null);
                echo "\" id=\"notification_list_button\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFICATIONS");
                echo "\" class=\"dropdown-trigger\">
\t\t\t\t\t\t\t<i class=\"icon fa-bell fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 153
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFICATIONS");
                echo "</span>
\t\t\t\t\t\t\t<strong class=\"badge";
                // line 154
                if ( !(isset($context["NOTIFICATIONS_COUNT"]) ? $context["NOTIFICATIONS_COUNT"] : null)) {
                    echo " hidden";
                }
                echo "\">
\t\t\t\t\t\t\t\t<span class=\"counter\">";
                // line 155
                echo (isset($context["NOTIFICATIONS_COUNT"]) ? $context["NOTIFICATIONS_COUNT"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t<span class=\"arrow\"></span>
\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                // line 159
                $location = "notification_dropdown.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("notification_dropdown.html", "navbar_header.html", 159)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 160
                echo "\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 162
            echo "\t\t\t\t";
            // line 163
            echo "\t\t\t";
        } else {
            // line 164
            echo "\t\t\t\t<li class=\"rightside logout\" data-skip-responsive=\"true\">
\t\t\t\t\t<a href=\"";
            // line 165
            echo (isset($context["U_LOGIN_LOGOUT"]) ? $context["U_LOGIN_LOGOUT"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "\" accesskey=\"x\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-power-off fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 166
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t";
            // line 169
            if (((isset($context["S_REGISTER_ENABLED"]) ? $context["S_REGISTER_ENABLED"] : null) &&  !((isset($context["S_SHOW_COPPA"]) ? $context["S_SHOW_COPPA"] : null) || (isset($context["S_REGISTRATION"]) ? $context["S_REGISTRATION"] : null)))) {
                // line 170
                echo "\t\t\t\t\t<li class=\"rightside register\" data-skip-responsive=\"true\" data-select-match=\"register\">
\t\t\t\t\t\t<a href=\"";
                // line 171
                echo (isset($context["U_REGISTER"]) ? $context["U_REGISTER"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REGISTER");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t<i class=\"icon fa-pencil-square-o fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 172
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REGISTER");
                echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 176
            echo "\t\t\t\t";
            // line 177
            echo "\t\t\t";
        }
        // line 178
        echo "
\t\t\t";
        // line 179
        if ((isset($context["U_ACP"]) ? $context["U_ACP"] : null)) {
            // line 180
            echo "\t\t\t\t<li class=\"rightside acp\" data-last-responsive=\"true\">
\t\t\t\t\t<a href=\"";
            // line 181
            echo (isset($context["U_ACP"]) ? $context["U_ACP"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-cogs fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 182
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_SHORT");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 186
        echo "\t\t\t";
        if ((isset($context["U_MCP"]) ? $context["U_MCP"] : null)) {
            // line 187
            echo "\t\t\t\t<li class=\"rightside mcp\" data-last-responsive=\"true\" data-select-match=\"mcp\">
\t\t\t\t\t<a href=\"";
            // line 188
            echo (isset($context["U_MCP"]) ? $context["U_MCP"] : null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MCP");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-gavel fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 189
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MCP_SHORT");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 193
        echo "\t\t\t";
        // line 194
        echo "\t\t\t<li class=\"rightside faq\" ";
        if ( !(isset($context["S_USER_LOGGED_IN"]) ? $context["S_USER_LOGGED_IN"] : null)) {
            echo "data-skip-responsive=\"true\"";
        } else {
            echo "data-last-responsive=\"true\"";
        }
        echo ">
\t\t\t\t<a href=\"";
        // line 195
        echo (isset($context["U_FAQ"]) ? $context["U_FAQ"] : null);
        echo "\" title=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FAQ_EXPLAIN");
        echo "\" rel=\"help\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-question-circle fa-fw\" aria-hidden=\"true\"></i><span>";
        // line 196
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FAQ");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
        // line 199
        // line 200
        echo "\t\t</ul>

\t</div>
</div>

<div class=\"navbar navbar-links\">
\t<div class=\"inner\">

\t\t<ul id=\"nav-links\" class=\"nav-links linklist\" role=\"menubar\">
\t\t\t";
        // line 209
        if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "NAVLINKS_SHOW_DEFAULT", []) == 1)) {
            // line 210
            echo "\t\t\t\t";
            if (((isset($context["U_WATCH_FORUM_LINK"]) ? $context["U_WATCH_FORUM_LINK"] : null) &&  !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null))) {
                // line 211
                echo "\t\t\t\t\t<li data-last-responsive=\"true\">
\t\t\t\t\t\t<a href=\"";
                // line 212
                echo (isset($context["U_WATCH_FORUM_LINK"]) ? $context["U_WATCH_FORUM_LINK"] : null);
                echo "\" title=\"";
                echo (isset($context["S_WATCH_FORUM_TITLE"]) ? $context["S_WATCH_FORUM_TITLE"] : null);
                echo "\" data-ajax=\"toggle_link\" data-toggle-class=\"icon ";
                if ((isset($context["S_WATCHING_FORUM"]) ? $context["S_WATCHING_FORUM"] : null)) {
                    echo "fa-check-square-o";
                } else {
                    echo "fa-square-o";
                }
                echo " fa-fw\" data-toggle-text=\"";
                echo (isset($context["S_WATCH_FORUM_TOGGLE"]) ? $context["S_WATCH_FORUM_TOGGLE"] : null);
                echo "\" data-toggle-url=\"";
                echo (isset($context["U_WATCH_FORUM_TOGGLE"]) ? $context["U_WATCH_FORUM_TOGGLE"] : null);
                echo "\">
\t\t\t\t\t\t\t<i class=\"icon ";
                // line 213
                if ((isset($context["S_WATCHING_FORUM"]) ? $context["S_WATCHING_FORUM"] : null)) {
                    echo "fa-square-o";
                } else {
                    echo "fa-check-square-o";
                }
                echo " fa-fw\" aria-hidden=\"true\"></i><span>";
                echo (isset($context["S_WATCH_FORUM_TITLE"]) ? $context["S_WATCH_FORUM_TITLE"] : null);
                echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 217
            echo "\t\t\t\t";
            echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "NAVLINKS", []);
            echo "
\t\t\t\t";
            // line 218
            if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "NAVLINKS_SHOW_DEFAULT", []) && (isset($context["S_DISPLAY_SEARCH"]) ? $context["S_DISPLAY_SEARCH"] : null))) {
                // line 219
                echo "\t\t\t\t\t";
                if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SEARCH_HEADER", []) && $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SEARCH_BOX", []))) {
                    echo "<li class=\"responsive-search\"><a href=\"";
                    echo (isset($context["U_SEARCH"]) ? $context["U_SEARCH"] : null);
                    echo "\">
\t\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span>";
                    // line 220
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
                    echo "</span>
\t\t\t\t\t</a></li>";
                }
                // line 222
                echo "\t\t\t\t\t";
                if ((isset($context["S_USER_LOGGED_IN"]) ? $context["S_USER_LOGGED_IN"] : null)) {
                    // line 223
                    echo "\t\t\t\t\t\t<li><a href=\"";
                    echo (isset($context["U_SEARCH_NEW"]) ? $context["U_SEARCH_NEW"] : null);
                    echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t<i class=\"icon fa-file-o fa-fw\" aria-hidden=\"true\"></i><span>";
                    // line 224
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_NEW");
                    echo "</span>
\t\t\t\t\t\t</a></li>
\t\t\t\t\t";
                }
                // line 227
                echo "\t\t\t\t";
            }
            // line 228
            echo "\t\t\t";
        } else {
            // line 229
            echo "\t\t\t\t";
            if ( !(isset($context["S_REGISTERED_USER"]) ? $context["S_REGISTERED_USER"] : null)) {
                // line 230
                echo "\t\t\t\t\t<li><a href=\"";
                echo (isset($context["U_LOGIN_LOGOUT"]) ? $context["U_LOGIN_LOGOUT"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
                echo "\">
\t\t\t\t\t\t<i class=\"icon fa-power-off fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 231
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
                echo "</span>
\t\t\t\t\t</a></li>
\t\t\t\t\t";
                // line 233
                if ((isset($context["S_REGISTER_ENABLED"]) ? $context["S_REGISTER_ENABLED"] : null)) {
                    // line 234
                    echo "\t\t\t\t\t\t<li><a href=\"";
                    echo (isset($context["U_REGISTER"]) ? $context["U_REGISTER"] : null);
                    echo "\">
\t\t\t\t\t\t\t<i class=\"icon fa-pencil-square-o fa-fw\" aria-hidden=\"true\"></i><span>";
                    // line 235
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REGISTER");
                    echo "</span>
\t\t\t\t\t\t</a></li>
\t\t\t\t\t";
                }
                // line 238
                echo "\t\t\t\t";
            } elseif ( !(isset($context["S_DISPLAY_SEARCH"]) ? $context["S_DISPLAY_SEARCH"] : null)) {
                // line 239
                echo "\t\t\t\t\t<li><a href=\"";
                echo (isset($context["U_PROFILE"]) ? $context["U_PROFILE"] : null);
                echo "\">
\t\t\t\t\t\t<i class=\"icon fa-pencil-square-o fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 240
                echo (isset($context["CURRENT_USERNAME_SIMPLE"]) ? $context["CURRENT_USERNAME_SIMPLE"] : null);
                echo "</span>
\t\t\t\t\t</a></li>
\t\t\t\t";
            }
            // line 243
            echo "\t\t\t";
        }
        // line 244
        echo "
\t\t\t";
        // line 245
        if ((($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SEARCH_HEADER", []) == 0) && $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SEARCH_BOX", []))) {
            // line 246
            echo "\t\t\t\t<li class=\"rightside nav-search not-responsive\">";
            echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SEARCH_BOX", []);
            echo "</li>
\t\t\t";
        }
        // line 248
        echo "
\t\t\t<li class=\"rightside\" data-skip-responsive=\"false\">
\t\t\t\t<a href=\"#\" id=\"theme-switcher\">
\t\t\t\t\t<i class=\"icon fa-lightbulb-o fa-fw\"></i>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>

\t</div>
</div>

<div class=\"navbar navbar-breadcrumbs\">
\t<div class=\"inner\">

\t\t<ul id=\"nav-breadcrumbs\" class=\"nav-breadcrumbs linklist navlinks\" role=\"menubar\">
\t\t\t";
        // line 263
        $value = " itemtype=\"http://schema.org/ListItem\" itemprop=\"itemListElement\" itemscope";
        $context['definition']->set('MICRODATA', $value);
        // line 264
        echo "\t\t\t";
        $context["navlink_position"] = 1;
        // line 265
        echo "\t\t\t";
        // line 266
        echo "\t\t\t<li class=\"breadcrumbs\" itemscope itemtype=\"http://schema.org/BreadcrumbList\">
\t\t\t\t";
        // line 267
        // line 268
        echo "\t\t\t\t\t<span class=\"crumb\" ";
        echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "MICRODATA", []);
        echo "><a href=\"";
        echo (isset($context["U_INDEX"]) ? $context["U_INDEX"] : null);
        echo "\" itemtype=\"https://schema.org/Thing\" itemprop=\"item\" accesskey=\"h\" data-navbar-reference=\"index\">";
        if ( !(isset($context["U_SITE_HOME"]) ? $context["U_SITE_HOME"] : null)) {
            echo "<i class=\"icon fa-home fa-fw\"></i>";
        }
        echo "<span itemprop=\"name\">";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("INDEX");
        echo "</span></a><meta itemprop=\"position\" content=\"";
        echo (isset($context["navlink_position"]) ? $context["navlink_position"] : null);
        $context["navlink_position"] = ((isset($context["navlink_position"]) ? $context["navlink_position"] : null) + 1);
        echo "\" /></span>

\t\t\t\t";
        // line 270
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "navlinks", []));
        foreach ($context['_seq'] as $context["_key"] => $context["navlinks"]) {
            // line 271
            echo "\t\t\t\t\t";
            // line 272
            echo "\t\t\t\t\t<span class=\"crumb\" ";
            echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "MICRODATA", []);
            if ($this->getAttribute($context["navlinks"], "MICRODATA", [])) {
                echo " ";
                echo $this->getAttribute($context["navlinks"], "MICRODATA", []);
            }
            echo "><a href=\"";
            echo $this->getAttribute($context["navlinks"], "U_VIEW_FORUM", []);
            echo "\" itemtype=\"https://schema.org/Thing\" itemprop=\"item\"><span itemprop=\"name\">";
            echo $this->getAttribute($context["navlinks"], "FORUM_NAME", []);
            echo "</span></a><meta itemprop=\"position\" content=\"";
            echo (isset($context["navlink_position"]) ? $context["navlink_position"] : null);
            $context["navlink_position"] = ((isset($context["navlink_position"]) ? $context["navlink_position"] : null) + 1);
            echo "\" /></span>
\t\t\t\t\t";
            // line 273
            // line 274
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['navlinks'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 275
        echo "\t\t\t\t";
        // line 276
        echo "\t\t\t</li>
\t\t\t";
        // line 277
        // line 278
        echo "
\t\t\t<li class=\"rightside dropdown-container timebox\" id=\"timebox\" data-skip-responsive=\"false\">
\t\t\t\t<a href=\"#\" class=\"dropdown-trigger\" title=\"";
        // line 280
        echo (isset($context["CURRENT_TIME"]) ? $context["CURRENT_TIME"] : null);
        echo "\">
\t\t\t\t\t<i class=\"icon fa-clock-o fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
        // line 281
        echo (isset($context["CURRENT_TIME"]) ? $context["CURRENT_TIME"] : null);
        echo "</span>
\t\t\t\t</a>
\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">
\t\t\t\t\t\t<li>";
        // line 286
        echo (isset($context["CURRENT_TIME"]) ? $context["CURRENT_TIME"] : null);
        echo "</li>
\t\t\t\t\t\t";
        // line 287
        if ((isset($context["S_USER_LOGGED_IN"]) ? $context["S_USER_LOGGED_IN"] : null)) {
            echo "<li>";
            echo (isset($context["LAST_VISIT_DATE"]) ? $context["LAST_VISIT_DATE"] : null);
            echo "</li>";
        }
        // line 288
        echo "\t\t\t\t\t\t<li>";
        echo (isset($context["S_TIMEZONE"]) ? $context["S_TIMEZONE"] : null);
        echo "</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</li>
\t\t</ul>

\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "navbar_header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  806 => 288,  800 => 287,  796 => 286,  788 => 281,  784 => 280,  780 => 278,  779 => 277,  776 => 276,  774 => 275,  768 => 274,  767 => 273,  751 => 272,  749 => 271,  745 => 270,  728 => 268,  727 => 267,  724 => 266,  722 => 265,  719 => 264,  716 => 263,  699 => 248,  693 => 246,  691 => 245,  688 => 244,  685 => 243,  679 => 240,  674 => 239,  671 => 238,  665 => 235,  660 => 234,  658 => 233,  653 => 231,  646 => 230,  643 => 229,  640 => 228,  637 => 227,  631 => 224,  626 => 223,  623 => 222,  618 => 220,  611 => 219,  609 => 218,  604 => 217,  591 => 213,  575 => 212,  572 => 211,  569 => 210,  567 => 209,  556 => 200,  555 => 199,  549 => 196,  543 => 195,  534 => 194,  532 => 193,  525 => 189,  519 => 188,  516 => 187,  513 => 186,  506 => 182,  500 => 181,  497 => 180,  495 => 179,  492 => 178,  489 => 177,  487 => 176,  480 => 172,  474 => 171,  471 => 170,  469 => 169,  463 => 166,  457 => 165,  454 => 164,  451 => 163,  449 => 162,  445 => 160,  433 => 159,  426 => 155,  420 => 154,  416 => 153,  410 => 152,  405 => 151,  402 => 150,  393 => 144,  387 => 143,  383 => 142,  377 => 141,  374 => 140,  372 => 139,  369 => 138,  368 => 137,  359 => 131,  353 => 130,  348 => 127,  347 => 126,  340 => 122,  334 => 121,  331 => 120,  324 => 116,  318 => 115,  315 => 114,  313 => 113,  310 => 112,  309 => 111,  306 => 110,  299 => 106,  295 => 105,  292 => 104,  290 => 103,  274 => 99,  271 => 98,  270 => 97,  267 => 96,  265 => 95,  263 => 94,  260 => 93,  254 => 89,  247 => 85,  241 => 84,  238 => 83,  235 => 82,  228 => 78,  222 => 77,  219 => 76,  217 => 75,  209 => 70,  203 => 69,  200 => 68,  198 => 67,  192 => 64,  186 => 63,  183 => 62,  176 => 58,  170 => 57,  167 => 56,  165 => 55,  159 => 51,  158 => 50,  154 => 48,  147 => 44,  141 => 43,  134 => 39,  128 => 38,  125 => 37,  118 => 33,  112 => 32,  109 => 31,  106 => 30,  99 => 26,  93 => 25,  90 => 24,  87 => 23,  80 => 19,  74 => 18,  71 => 17,  69 => 16,  66 => 15,  64 => 14,  61 => 13,  60 => 12,  52 => 7,  48 => 6,  42 => 5,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "navbar_header.html", "");
    }
}
