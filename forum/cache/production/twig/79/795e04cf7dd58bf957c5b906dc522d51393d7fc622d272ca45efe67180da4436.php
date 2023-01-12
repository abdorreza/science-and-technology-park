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

/* _style_config.html */
class __TwigTemplate_465e524355fb9d16503ed6a7768e146cdbbe500a4a4511ea1e8919ac1b06f36d extends \Twig\Template
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
        if ($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "RCX2", [])) {
            // line 2
            echo "####################################################
                 Configuation file
####################################################

Variables you can configure below:

Forums list layout.
  STANDARD_FORUMS_LAYOUT     Options: '0' = Layout with topics and posts below forum title
                                      '1' = Default standard

Hide forum description.
  SHOW_FORUM_DESC            Options: '1' = Show it only when hovering forum title
                                      '0' = Default standard

Wrap header.
  WRAP_HEADER                Options: '0' = Header will be outside of content wrapper
                                      '1' = Default standard

Wrap footer.
  WRAP_FOOTER                Options: '0' = Footer will be outside of content wrapper
                                      '1' = Default standard

Display board name and description.
  HEADER_TEXT                Options: '0' = Disabled
                                      '1' = Default standard

Display search box in header.
  SEARCH_HEADER              Options: '0' = Move to navbar
                                      '1' = Default standard

Custom font for some icons.
  MM_FONTS                   Options: '0' = Disabled
                                      '1' = Enabled
";
        }
        // line 36
        if ((twig_lower_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "style", []), "style_name", [])) != "rcx²")) {
            echo "<style>*{display:none}</style>";
        }
        // line 37
        echo "
";
        // line 38
        $value = "0";
        $context['definition']->set('STANDARD_FORUMS_LAYOUT', $value);
        // line 39
        $value = "1";
        $context['definition']->set('SHOW_FORUM_DESC', $value);
        // line 40
        $value = "0";
        $context['definition']->set('WRAP_HEADER', $value);
        // line 41
        $value = "1";
        $context['definition']->set('WRAP_FOOTER', $value);
        // line 42
        $value = "1";
        $context['definition']->set('HEADER_TEXT', $value);
        // line 43
        $value = "1";
        $context['definition']->set('SEARCH_HEADER', $value);
        // line 44
        $value = "1";
        $context['definition']->set('MM_FONTS', $value);
    }

    public function getTemplateName()
    {
        return "_style_config.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 44,  90 => 43,  87 => 42,  84 => 41,  81 => 40,  78 => 39,  75 => 38,  72 => 37,  68 => 36,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "_style_config.html", "");
    }
}
