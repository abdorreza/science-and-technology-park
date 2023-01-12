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

/* index_body.html */
class __TwigTemplate_6bfdcc039146901efd62934609d79acbe5ea26261f4b4b70e4a5734208c82799 extends \Twig\Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "index_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
";
        // line 3
        // line 4
        echo "
";
        // line 5
        // line 6
        echo "
";
        // line 7
        $location = "forumlist_body.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("forumlist_body.html", "index_body.html", 7)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 8
        echo "
";
        // line 9
        // line 10
        echo "
<div class=\"forabg\">
\t<div class=\"inner\">
\t<ul class=\"topiclist\">
\t\t<li class=\"header\">
\t\t\t<dl class=\"row-item\">
\t\t\t\t<dt><div class=\"list-inner\">";
        // line 16
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("INFORMATION");
        echo "</div></dt>
\t\t\t</dl>
\t\t</li>
\t</ul>
\t<ul class=\"topiclist forums stats zebra-list\">
\t
\t\t";
        // line 22
        if (( !(isset($context["S_USER_LOGGED_IN"]) ? $context["S_USER_LOGGED_IN"] : null) &&  !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null))) {
            // line 23
            echo "\t\t\t<li class=\"row\">
\t\t\t\t<div class=\"stat-block\">
\t\t\t\t\t<form method=\"post\" action=\"";
            // line 25
            echo (isset($context["S_LOGIN_ACTION"]) ? $context["S_LOGIN_ACTION"] : null);
            echo "\">
\t\t\t\t\t<h3><i class=\"icon fa-fw fa-sign-in\"></i> <a href=\"";
            // line 26
            echo (isset($context["U_LOGIN_LOGOUT"]) ? $context["U_LOGIN_LOGOUT"] : null);
            echo "\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "</a>";
            if ((isset($context["S_REGISTER_ENABLED"]) ? $context["S_REGISTER_ENABLED"] : null)) {
                echo " &bull; <a href=\"";
                echo (isset($context["U_REGISTER"]) ? $context["U_REGISTER"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REGISTER");
                echo "</a>";
            }
            echo "</h3>
\t\t\t\t\t\t<fieldset class=\"quick-login\">
\t\t\t\t\t\t\t<label for=\"username\"><span>";
            // line 28
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("USERNAME");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</span> <input type=\"text\" tabindex=\"1\" name=\"username\" id=\"username\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("USERNAME");
            echo "\" /></label>
\t\t\t\t\t\t\t<label for=\"password\"><span>";
            // line 29
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PASSWORD");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</span> <input type=\"password\" tabindex=\"2\" name=\"password\" id=\"password\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PASSWORD");
            echo "\" autocomplete=\"off\" /></label>
\t\t\t\t\t\t\t";
            // line 30
            if ((isset($context["U_SEND_PASSWORD"]) ? $context["U_SEND_PASSWORD"] : null)) {
                // line 31
                echo "\t\t\t\t\t\t\t\t<a href=\"";
                echo (isset($context["U_SEND_PASSWORD"]) ? $context["U_SEND_PASSWORD"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORGOT_PASS");
                echo "</a>
\t\t\t\t\t\t\t";
            }
            // line 33
            echo "\t\t\t\t\t\t\t";
            if ((isset($context["S_AUTOLOGIN_ENABLED"]) ? $context["S_AUTOLOGIN_ENABLED"] : null)) {
                // line 34
                echo "\t\t\t\t\t\t\t\t<span class=\"responsive-hide\">|</span> <label for=\"autologin\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOG_ME_IN");
                echo " <input type=\"checkbox\" tabindex=\"4\" name=\"autologin\" id=\"autologin\" /></label>
\t\t\t\t\t\t\t";
            }
            // line 36
            echo "\t\t\t\t\t\t\t<input type=\"submit\" tabindex=\"5\" name=\"login\" value=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN");
            echo "\" class=\"button2\" />
\t\t\t\t\t\t\t";
            // line 37
            echo (isset($context["S_LOGIN_REDIRECT"]) ? $context["S_LOGIN_REDIRECT"] : null);
            echo "
\t\t\t\t\t\t</fieldset>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</li>
\t\t";
        }
        // line 43
        echo "
\t\t";
        // line 44
        // line 45
        echo "
\t\t";
        // line 46
        if ((isset($context["S_DISPLAY_ONLINE_LIST"]) ? $context["S_DISPLAY_ONLINE_LIST"] : null)) {
            // line 47
            echo "\t\t\t<li class=\"row\">
\t\t\t\t<div class=\"stat-block online-list\">
\t\t\t\t\t";
            // line 49
            if ((isset($context["U_VIEWONLINE"]) ? $context["U_VIEWONLINE"] : null)) {
                echo "<h3><i class=\"icon fa-fw fa-users\"></i> <a href=\"";
                echo (isset($context["U_VIEWONLINE"]) ? $context["U_VIEWONLINE"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
                echo "</a></h3>";
            } else {
                echo "<h3><i class=\"icon fa-fw fa-users\"></i> ";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
                echo "</h3>";
            }
            // line 50
            echo "\t\t\t\t\t<p>
\t\t\t\t\t\t";
            // line 51
            // line 52
            echo "\t\t\t\t\t\t";
            echo (isset($context["TOTAL_USERS_ONLINE"]) ? $context["TOTAL_USERS_ONLINE"] : null);
            echo " (";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ONLINE_EXPLAIN");
            echo ")<br />";
            echo (isset($context["RECORD_USERS"]) ? $context["RECORD_USERS"] : null);
            echo "<br />
\t\t\t\t\t\t";
            // line 53
            if ((isset($context["U_VIEWONLINE"]) ? $context["U_VIEWONLINE"] : null)) {
                // line 54
                echo "\t\t\t\t\t\t\t\t<br />";
                echo (isset($context["LOGGED_IN_USER_LIST"]) ? $context["LOGGED_IN_USER_LIST"] : null);
                echo "
\t\t\t\t\t\t\t\t";
                // line 55
                if ((isset($context["LEGEND"]) ? $context["LEGEND"] : null)) {
                    echo "<br /><em>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LEGEND");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " ";
                    echo (isset($context["LEGEND"]) ? $context["LEGEND"] : null);
                    echo "</em>";
                }
                // line 56
                echo "\t\t\t\t\t\t";
            }
            // line 57
            echo "\t\t\t\t\t\t";
            // line 58
            echo "\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</li>
\t\t";
        }
        // line 62
        echo "\t\t
\t\t";
        // line 63
        // line 64
        echo "
\t\t";
        // line 65
        if ((isset($context["S_DISPLAY_BIRTHDAY_LIST"]) ? $context["S_DISPLAY_BIRTHDAY_LIST"] : null)) {
            // line 66
            echo "\t\t\t<li class=\"row\">
\t\t\t\t<div class=\"stat-block birthday-list\">
\t\t\t\t\t<h3><i class=\"icon fa-fw fa-birthday-cake\"></i> ";
            // line 68
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BIRTHDAYS");
            echo "</h3>
\t\t\t\t\t<p>
\t\t\t\t\t\t";
            // line 70
            // line 71
            echo "\t\t\t\t\t\t";
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "birthdays", []))) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CONGRATULATIONS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " <strong>";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "birthdays", []));
                foreach ($context['_seq'] as $context["_key"] => $context["birthdays"]) {
                    echo $this->getAttribute($context["birthdays"], "USERNAME", []);
                    if (($this->getAttribute($context["birthdays"], "AGE", []) !== "")) {
                        echo " (";
                        echo $this->getAttribute($context["birthdays"], "AGE", []);
                        echo ")";
                    }
                    if ( !$this->getAttribute($context["birthdays"], "S_LAST_ROW", [])) {
                        echo ", ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['birthdays'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</strong>";
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_BIRTHDAYS");
            }
            // line 72
            echo "\t\t\t\t\t\t";
            // line 73
            echo "\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</li>
\t\t";
        }
        // line 77
        echo "
\t\t";
        // line 78
        if ((isset($context["NEWEST_USER"]) ? $context["NEWEST_USER"] : null)) {
            // line 79
            echo "\t\t\t<li class=\"row\">
\t\t\t\t<div class=\"stat-block statistics\">
\t\t\t\t\t<h3><i class=\"icon fa-fw fa-bar-chart\"></i> ";
            // line 81
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("STATISTICS");
            echo "</h3>
\t\t\t\t\t<p>
\t\t\t\t\t\t";
            // line 83
            // line 84
            echo "\t\t\t\t\t\t";
            echo (isset($context["TOTAL_POSTS"]) ? $context["TOTAL_POSTS"] : null);
            echo " &bull; ";
            echo (isset($context["TOTAL_TOPICS"]) ? $context["TOTAL_TOPICS"] : null);
            echo " &bull; ";
            echo (isset($context["TOTAL_USERS"]) ? $context["TOTAL_USERS"] : null);
            echo " &bull; ";
            echo (isset($context["NEWEST_USER"]) ? $context["NEWEST_USER"] : null);
            echo "
\t\t\t\t\t\t";
            // line 85
            // line 86
            echo "\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t</li>
\t\t";
        }
        // line 90
        echo "
\t\t";
        // line 91
        // line 92
        echo "
\t</ul>
\t</div>
</div>

";
        // line 97
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "index_body.html", 97)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "index_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  320 => 97,  313 => 92,  312 => 91,  309 => 90,  303 => 86,  302 => 85,  291 => 84,  290 => 83,  285 => 81,  281 => 79,  279 => 78,  276 => 77,  270 => 73,  268 => 72,  242 => 71,  241 => 70,  236 => 68,  232 => 66,  230 => 65,  227 => 64,  226 => 63,  223 => 62,  217 => 58,  215 => 57,  212 => 56,  203 => 55,  198 => 54,  196 => 53,  187 => 52,  186 => 51,  183 => 50,  171 => 49,  167 => 47,  165 => 46,  162 => 45,  161 => 44,  158 => 43,  149 => 37,  144 => 36,  138 => 34,  135 => 33,  127 => 31,  125 => 30,  118 => 29,  111 => 28,  96 => 26,  92 => 25,  88 => 23,  86 => 22,  77 => 16,  69 => 10,  68 => 9,  65 => 8,  53 => 7,  50 => 6,  49 => 5,  46 => 4,  45 => 3,  42 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "index_body.html", "");
    }
}
