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

/* viewtopic_body.html */
class __TwigTemplate_91e19a2098981a9647fc3d7548afea5f1a15f51fd4e594f16bce92b670a5471c extends \Twig\Template
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
        ob_start();
        // line 2
        if (( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null) && (((((((isset($context["U_VIEW_UNREAD_POST"]) ? $context["U_VIEW_UNREAD_POST"] : null) || (isset($context["U_WATCH_TOPIC"]) ? $context["U_WATCH_TOPIC"] : null)) || (isset($context["U_BOOKMARK_TOPIC"]) ? $context["U_BOOKMARK_TOPIC"] : null)) || (isset($context["U_BUMP_TOPIC"]) ? $context["U_BUMP_TOPIC"] : null)) || (isset($context["U_EMAIL_TOPIC"]) ? $context["U_EMAIL_TOPIC"] : null)) || (isset($context["U_PRINT_TOPIC"]) ? $context["U_PRINT_TOPIC"] : null)) || (isset($context["S_DISPLAY_TOPIC_TOOLS"]) ? $context["S_DISPLAY_TOPIC_TOOLS"] : null)))) {
            // line 3
            echo "\t";
            if ((isset($context["U_VIEW_UNREAD_POST"]) ? $context["U_VIEW_UNREAD_POST"] : null)) {
                // line 4
                echo "\t\t<li><a href=\"";
                echo (isset($context["U_VIEW_UNREAD_POST"]) ? $context["U_VIEW_UNREAD_POST"] : null);
                echo "\"><i class=\"icon fa-eye fa-fw\" aria-hidden=\"true\"></i><span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_UNREAD_POST");
                echo "</span></a></li>
\t";
            }
            // line 6
            echo "\t";
            if ((isset($context["U_WATCH_TOPIC"]) ? $context["U_WATCH_TOPIC"] : null)) {
                // line 7
                echo "\t\t<li>
\t\t\t<a href=\"";
                // line 8
                echo (isset($context["U_WATCH_TOPIC"]) ? $context["U_WATCH_TOPIC"] : null);
                echo "\" class=\"watch-topic-link\" title=\"";
                echo (isset($context["S_WATCH_TOPIC_TITLE"]) ? $context["S_WATCH_TOPIC_TITLE"] : null);
                echo "\" data-ajax=\"toggle_link\" data-toggle-class=\"icon ";
                if ((isset($context["S_WATCHING_TOPIC"]) ? $context["S_WATCHING_TOPIC"] : null)) {
                    echo "fa-check-square-o";
                } else {
                    echo "fa-square-o";
                }
                echo " fa-fw\" data-toggle-text=\"";
                echo (isset($context["S_WATCH_TOPIC_TOGGLE"]) ? $context["S_WATCH_TOPIC_TOGGLE"] : null);
                echo "\" data-toggle-url=\"";
                echo (isset($context["U_WATCH_TOPIC_TOGGLE"]) ? $context["U_WATCH_TOPIC_TOGGLE"] : null);
                echo "\" data-update-all=\".watch-topic-link\">
\t\t\t\t<i class=\"icon ";
                // line 9
                if ((isset($context["S_WATCHING_FORUM"]) ? $context["S_WATCHING_FORUM"] : null)) {
                    echo "fa-square-o";
                } else {
                    echo "fa-check-square-o";
                }
                echo " fa-fw\" aria-hidden=\"true\"></i><span>";
                echo (isset($context["S_WATCH_TOPIC_TITLE"]) ? $context["S_WATCH_TOPIC_TITLE"] : null);
                echo "</span>
\t\t\t</a>
\t\t</li>
\t";
            }
            // line 13
            $value = 1;
            $context['definition']->set('NAVLINKS_SHOW_DEFAULT', $value);
        }
        $value = ('' === $value = ob_get_clean()) ? '' : new \Twig_Markup($value, $this->env->getCharset());
        $context['definition']->set('NAVLINKS', $value);
        // line 16
        echo "
";
        // line 17
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "viewtopic_body.html", 17)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 18
        echo "
";
        // line 19
        // line 20
        echo "<h2 class=\"topic-title\">";
        echo "<a href=\"";
        echo (isset($context["U_VIEW_TOPIC"]) ? $context["U_VIEW_TOPIC"] : null);
        echo "\">";
        echo (isset($context["TOPIC_TITLE"]) ? $context["TOPIC_TITLE"] : null);
        echo "</a>";
        echo "</h2>
";
        // line 21
        // line 22
        echo "<!-- NOTE: remove the style=\"display: none\" when you want to have the forum description on the topic body -->
";
        // line 23
        if ((isset($context["FORUM_DESC"]) ? $context["FORUM_DESC"] : null)) {
            echo "<div style=\"display: none !important;\">";
            echo (isset($context["FORUM_DESC"]) ? $context["FORUM_DESC"] : null);
            echo "<br /></div>";
        }
        // line 24
        echo "
";
        // line 25
        if ((isset($context["MODERATORS"]) ? $context["MODERATORS"] : null)) {
            // line 26
            echo "<p>
\t<strong>";
            // line 27
            if ((isset($context["S_SINGLE_MODERATOR"]) ? $context["S_SINGLE_MODERATOR"] : null)) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MODERATOR");
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MODERATORS");
            }
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</strong> ";
            echo (isset($context["MODERATORS"]) ? $context["MODERATORS"] : null);
            echo "
</p>
";
        }
        // line 30
        echo "
";
        // line 31
        if ((isset($context["S_FORUM_RULES"]) ? $context["S_FORUM_RULES"] : null)) {
            // line 32
            echo "\t<div class=\"rules";
            if ((isset($context["U_FORUM_RULES"]) ? $context["U_FORUM_RULES"] : null)) {
                echo " rules-link";
            }
            echo "\">
\t\t<div class=\"inner\">

\t\t";
            // line 35
            if ((isset($context["U_FORUM_RULES"]) ? $context["U_FORUM_RULES"] : null)) {
                // line 36
                echo "\t\t\t<a href=\"";
                echo (isset($context["U_FORUM_RULES"]) ? $context["U_FORUM_RULES"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM_RULES");
                echo "</a>
\t\t";
            } else {
                // line 38
                echo "\t\t\t<strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM_RULES");
                echo "</strong><br />
\t\t\t";
                // line 39
                echo (isset($context["FORUM_RULES"]) ? $context["FORUM_RULES"] : null);
                echo "
\t\t";
            }
            // line 41
            echo "
\t\t</div>
\t</div>
";
        }
        // line 45
        echo "
<div class=\"action-bar bar-top\">
\t";
        // line 47
        // line 48
        echo "
\t";
        // line 49
        if (( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null) && (isset($context["S_DISPLAY_REPLY_INFO"]) ? $context["S_DISPLAY_REPLY_INFO"] : null))) {
            // line 50
            echo "\t\t<a href=\"";
            echo (isset($context["U_POST_REPLY_TOPIC"]) ? $context["U_POST_REPLY_TOPIC"] : null);
            echo "\" class=\"button";
            if ((isset($context["S_IS_LOCKED"]) ? $context["S_IS_LOCKED"] : null)) {
                echo " locked-button";
            }
            echo "\" title=\"";
            if ((isset($context["S_IS_LOCKED"]) ? $context["S_IS_LOCKED"] : null)) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_LOCKED");
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_REPLY");
            }
            echo "\">
\t\t\t";
            // line 51
            if ((isset($context["S_IS_LOCKED"]) ? $context["S_IS_LOCKED"] : null)) {
                // line 52
                echo "\t\t\t\t<span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_TOPIC_LOCKED");
                echo "</span> <i class=\"icon fa-lock fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
            } else {
                // line 54
                echo "\t\t\t\t<span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_POST_REPLY");
                echo "</span> <i class=\"icon fa-reply fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
            }
            // line 56
            echo "\t\t</a>
\t";
        }
        // line 58
        echo "
\t";
        // line 59
        // line 60
        echo "\t";
        $location = "viewtopic_topic_tools.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("viewtopic_topic_tools.html", "viewtopic_body.html", 60)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 61
        echo "\t";
        // line 62
        echo "
\t";
        // line 63
        if ((isset($context["S_DISPLAY_SEARCHBOX"]) ? $context["S_DISPLAY_SEARCHBOX"] : null)) {
            // line 64
            echo "\t\t<div class=\"search-box\" role=\"search\">
\t\t\t<form method=\"get\" id=\"topic-search\" action=\"";
            // line 65
            echo (isset($context["S_SEARCHBOX_ACTION"]) ? $context["S_SEARCHBOX_ACTION"] : null);
            echo "\">
\t\t\t<fieldset>
\t\t\t\t<input class=\"inputbox search tiny\"  type=\"search\" name=\"keywords\" id=\"search_keywords\" size=\"20\" placeholder=\"";
            // line 67
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_TOPIC");
            echo "\" />
\t\t\t\t<button class=\"button button-search\" type=\"submit\" title=\"";
            // line 68
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
            echo "\">
\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 69
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
            echo "</span>
\t\t\t\t</button>
\t\t\t\t<a href=\"";
            // line 71
            echo (isset($context["U_SEARCH"]) ? $context["U_SEARCH"] : null);
            echo "\" class=\"button button-search-end\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ADV");
            echo "\">
\t\t\t\t\t<i class=\"icon fa-cog fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 72
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ADV");
            echo "</span>
\t\t\t\t</a>
\t\t\t\t";
            // line 74
            echo (isset($context["S_SEARCH_LOCAL_HIDDEN_FIELDS"]) ? $context["S_SEARCH_LOCAL_HIDDEN_FIELDS"] : null);
            echo "
\t\t\t</fieldset>
\t\t\t</form>
\t\t</div>
\t";
        }
        // line 79
        echo "
\t";
        // line 80
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination", [])) || (isset($context["TOTAL_POSTS"]) ? $context["TOTAL_POSTS"] : null))) {
            // line 81
            echo "\t\t<div class=\"pagination\">
\t\t\t";
            // line 82
            echo (isset($context["TOTAL_POSTS"]) ? $context["TOTAL_POSTS"] : null);
            echo "
\t\t\t";
            // line 83
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination", []))) {
                // line 84
                echo "\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "viewtopic_body.html", 84)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 85
                echo "\t\t\t";
            } else {
                // line 86
                echo "\t\t\t\t&bull; ";
                echo (isset($context["PAGE_NUMBER"]) ? $context["PAGE_NUMBER"] : null);
                echo "
\t\t\t";
            }
            // line 88
            echo "\t\t</div>
\t";
        }
        // line 90
        echo "\t";
        // line 91
        echo "</div>

";
        // line 93
        // line 94
        echo "
";
        // line 95
        if ((isset($context["S_HAS_POLL"]) ? $context["S_HAS_POLL"] : null)) {
            // line 96
            echo "\t<form method=\"post\" action=\"";
            echo (isset($context["S_POLL_ACTION"]) ? $context["S_POLL_ACTION"] : null);
            echo "\" data-ajax=\"vote_poll\" class=\"topic_poll\">

\t<div class=\"panel\">
\t\t<div class=\"inner\">

\t\t<div class=\"content\">
\t\t\t<h2 class=\"poll-title\">";
            // line 102
            echo (isset($context["POLL_QUESTION"]) ? $context["POLL_QUESTION"] : null);
            echo "</h2>
\t\t\t<p class=\"author\">";
            // line 103
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POLL_LENGTH");
            if (((isset($context["S_CAN_VOTE"]) ? $context["S_CAN_VOTE"] : null) && (isset($context["L_POLL_LENGTH"]) ? $context["L_POLL_LENGTH"] : null))) {
                echo "<br />";
            }
            if ((isset($context["S_CAN_VOTE"]) ? $context["S_CAN_VOTE"] : null)) {
                echo "<span class=\"poll_max_votes\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MAX_VOTES");
                echo "</span>";
            }
            echo "</p>

\t\t\t<fieldset class=\"polls\">
\t\t\t";
            // line 106
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "poll_option", []));
            foreach ($context['_seq'] as $context["_key"] => $context["poll_option"]) {
                // line 107
                echo "\t\t\t\t";
                // line 108
                echo "\t\t\t\t<dl class=\"";
                if ($this->getAttribute($context["poll_option"], "POLL_OPTION_VOTED", [])) {
                    echo "voted";
                }
                if ($this->getAttribute($context["poll_option"], "POLL_OPTION_MOST_VOTES", [])) {
                    echo " most-votes";
                }
                echo "\"";
                if ($this->getAttribute($context["poll_option"], "POLL_OPTION_VOTED", [])) {
                    echo " title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POLL_VOTED_OPTION");
                    echo "\"";
                }
                echo " data-alt-text=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POLL_VOTED_OPTION");
                echo "\" data-poll-option-id=\"";
                echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                echo "\">
\t\t\t\t\t<dt>";
                // line 109
                if ((isset($context["S_CAN_VOTE"]) ? $context["S_CAN_VOTE"] : null)) {
                    echo "<label for=\"vote_";
                    echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                    echo "\">";
                    echo $this->getAttribute($context["poll_option"], "POLL_OPTION_CAPTION", []);
                    echo "</label>";
                } else {
                    echo $this->getAttribute($context["poll_option"], "POLL_OPTION_CAPTION", []);
                }
                echo "</dt>
\t\t\t\t\t";
                // line 110
                if ((isset($context["S_CAN_VOTE"]) ? $context["S_CAN_VOTE"] : null)) {
                    echo "<dd style=\"width: auto;\" class=\"poll_option_select\">";
                    if ((isset($context["S_IS_MULTI_CHOICE"]) ? $context["S_IS_MULTI_CHOICE"] : null)) {
                        echo "<input type=\"checkbox\" name=\"vote_id[]\" id=\"vote_";
                        echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                        echo "\" value=\"";
                        echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                        echo "\"";
                        if ($this->getAttribute($context["poll_option"], "POLL_OPTION_VOTED", [])) {
                            echo " checked=\"checked\"";
                        }
                        echo " />";
                    } else {
                        echo "<input type=\"radio\" name=\"vote_id[]\" id=\"vote_";
                        echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                        echo "\" value=\"";
                        echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                        echo "\"";
                        if ($this->getAttribute($context["poll_option"], "POLL_OPTION_VOTED", [])) {
                            echo " checked=\"checked\"";
                        }
                        echo " />";
                    }
                    echo "</dd>";
                }
                // line 111
                echo "\t\t\t\t\t<dd class=\"resultbar";
                if ( !(isset($context["S_DISPLAY_RESULTS"]) ? $context["S_DISPLAY_RESULTS"] : null)) {
                    echo " hidden";
                }
                echo "\"><div class=\"";
                if (($this->getAttribute($context["poll_option"], "POLL_OPTION_PCT", []) < 20)) {
                    echo "pollbar1";
                } elseif (($this->getAttribute($context["poll_option"], "POLL_OPTION_PCT", []) < 40)) {
                    echo "pollbar2";
                } elseif (($this->getAttribute($context["poll_option"], "POLL_OPTION_PCT", []) < 60)) {
                    echo "pollbar3";
                } elseif (($this->getAttribute($context["poll_option"], "POLL_OPTION_PCT", []) < 80)) {
                    echo "pollbar4";
                } else {
                    echo "pollbar5";
                }
                echo "\" style=\"width:";
                echo $this->getAttribute($context["poll_option"], "POLL_OPTION_PERCENT_REL", []);
                echo ";\">";
                echo $this->getAttribute($context["poll_option"], "POLL_OPTION_RESULT", []);
                echo "</div></dd>
\t\t\t\t\t<dd class=\"poll_option_percent";
                // line 112
                if ( !(isset($context["S_DISPLAY_RESULTS"]) ? $context["S_DISPLAY_RESULTS"] : null)) {
                    echo " hidden";
                }
                echo "\">";
                if (($this->getAttribute($context["poll_option"], "POLL_OPTION_RESULT", []) == 0)) {
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_VOTES");
                } else {
                    echo $this->getAttribute($context["poll_option"], "POLL_OPTION_PERCENT", []);
                }
                echo "</dd>
\t\t\t\t</dl>
\t\t\t\t";
                // line 114
                // line 115
                echo "\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poll_option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 116
            echo "
\t\t\t\t<dl class=\"poll_total_votes";
            // line 117
            if ( !(isset($context["S_DISPLAY_RESULTS"]) ? $context["S_DISPLAY_RESULTS"] : null)) {
                echo " hidden";
            }
            echo "\">
\t\t\t\t\t<dt>&nbsp;</dt>
\t\t\t\t\t<dd class=\"resultbar\">";
            // line 119
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOTAL_VOTES");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo " <span class=\"poll_total_vote_cnt\">";
            echo (isset($context["TOTAL_VOTES"]) ? $context["TOTAL_VOTES"] : null);
            echo "</span></dd>
\t\t\t\t</dl>

\t\t\t";
            // line 122
            if ((isset($context["S_CAN_VOTE"]) ? $context["S_CAN_VOTE"] : null)) {
                // line 123
                echo "\t\t\t\t<dl style=\"border-top: none;\" class=\"poll_vote\">
\t\t\t\t\t<dt>&nbsp;</dt>
\t\t\t\t\t<dd class=\"resultbar\"><input type=\"submit\" name=\"update\" value=\"";
                // line 125
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT_VOTE");
                echo "\" class=\"button1\" /></dd>
\t\t\t\t</dl>
\t\t\t";
            }
            // line 128
            echo "
\t\t\t";
            // line 129
            if ( !(isset($context["S_DISPLAY_RESULTS"]) ? $context["S_DISPLAY_RESULTS"] : null)) {
                // line 130
                echo "\t\t\t\t<dl style=\"border-top: none;\" class=\"poll_view_results\">
\t\t\t\t\t<dt>&nbsp;</dt>
\t\t\t\t\t<dd class=\"resultbar\"><a href=\"";
                // line 132
                echo (isset($context["U_VIEW_RESULTS"]) ? $context["U_VIEW_RESULTS"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_RESULTS");
                echo "</a></dd>
\t\t\t\t</dl>
\t\t\t";
            }
            // line 135
            echo "\t\t\t</fieldset>
\t\t\t<div class=\"vote-submitted hidden\">";
            // line 136
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VOTE_SUBMITTED");
            echo "</div>
\t\t</div>

\t\t</div>
\t\t";
            // line 140
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t\t";
            // line 141
            echo (isset($context["S_HIDDEN_FIELDS"]) ? $context["S_HIDDEN_FIELDS"] : null);
            echo "
\t</div>

\t</form>
\t<hr />
";
        }
        // line 147
        echo "
";
        // line 148
        // line 149
        echo "
";
        // line 150
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "postrow", []));
        foreach ($context['_seq'] as $context["_key"] => $context["postrow"]) {
            // line 151
            echo "\t";
            // line 152
            echo "\t";
            if ($this->getAttribute($context["postrow"], "S_FIRST_UNREAD", [])) {
                // line 153
                echo "\t\t<a id=\"unread\" class=\"anchor\"";
                if ((isset($context["S_UNREAD_VIEW"]) ? $context["S_UNREAD_VIEW"] : null)) {
                    echo " data-url=\"";
                    echo $this->getAttribute($context["postrow"], "U_MINI_POST", []);
                    echo "\"";
                }
                echo "></a>
\t";
            }
            // line 155
            echo "\t<div id=\"p";
            echo $this->getAttribute($context["postrow"], "POST_ID", []);
            echo "\" class=\"post has-profile ";
            if (($this->getAttribute($context["postrow"], "S_ROW_COUNT", []) % 2 == 1)) {
                echo "bg1";
            } else {
                echo "bg2";
            }
            if ($this->getAttribute($context["postrow"], "S_UNREAD_POST", [])) {
                echo " unreadpost";
            }
            if ($this->getAttribute($context["postrow"], "S_POST_REPORTED", [])) {
                echo " reported";
            }
            if ($this->getAttribute($context["postrow"], "S_POST_DELETED", [])) {
                echo " deleted";
            }
            if ($this->getAttribute($context["postrow"], "POSTER_WARNINGS", [])) {
                echo " warned";
            }
            echo "\">
\t\t<div class=\"inner\">

\t\t<dl class=\"postprofile\" id=\"profile";
            // line 158
            echo $this->getAttribute($context["postrow"], "POST_ID", []);
            echo "\"";
            if ($this->getAttribute($context["postrow"], "S_POST_HIDDEN", [])) {
                echo " style=\"display: none;\"";
            }
            echo ">
\t\t\t<dt class=\"";
            // line 159
            if (($this->getAttribute($context["postrow"], "RANK_TITLE", []) || $this->getAttribute($context["postrow"], "RANK_IMG", []))) {
                echo "has-profile-rank";
            } else {
                echo "no-profile-rank";
            }
            echo " ";
            if ($this->getAttribute($context["postrow"], "POSTER_AVATAR", [])) {
                echo "has-avatar";
            } else {
                echo "no-avatar";
            }
            echo "\">
\t\t\t\t<div class=\"online-icon\">";
            // line 160
            if ($this->getAttribute($context["postrow"], "S_ONLINE", [])) {
                echo "<i class=\"icon fa-wifi fa-fw online\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ONLINE");
                echo "</span>";
            } else {
                echo "<i class=\"icon fa-wifi fa-fw offline\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("OFFLINE");
                echo "</span>";
            }
            echo "</div>
\t\t\t\t<div class=\"avatar-container\">
\t\t\t\t\t";
            // line 162
            // line 163
            echo "\t\t\t\t\t";
            if ($this->getAttribute($context["postrow"], "POSTER_AVATAR", [])) {
                // line 164
                echo "\t\t\t\t\t\t";
                if ($this->getAttribute($context["postrow"], "U_POST_AUTHOR", [])) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["postrow"], "U_POST_AUTHOR", []);
                    echo "\" class=\"avatar\">";
                    echo $this->getAttribute($context["postrow"], "POSTER_AVATAR", []);
                    echo "</a>";
                } else {
                    echo "<span class=\"avatar\">";
                    echo $this->getAttribute($context["postrow"], "POSTER_AVATAR", []);
                    echo "</span>";
                }
                // line 165
                echo "\t\t\t\t\t";
            }
            // line 166
            echo "\t\t\t\t\t";
            // line 167
            echo "\t\t\t\t</div>
\t\t\t\t";
            // line 168
            // line 169
            echo "\t\t\t\t";
            if ( !$this->getAttribute($context["postrow"], "U_POST_AUTHOR", [])) {
                echo "<strong>";
                echo $this->getAttribute($context["postrow"], "POST_AUTHOR_FULL", []);
                echo "</strong>";
            } else {
                echo $this->getAttribute($context["postrow"], "POST_AUTHOR_FULL", []);
            }
            // line 170
            echo "\t\t\t\t";
            // line 171
            echo "\t\t\t</dt>

\t\t\t";
            // line 173
            // line 174
            echo "\t\t\t";
            if (($this->getAttribute($context["postrow"], "RANK_TITLE", []) || $this->getAttribute($context["postrow"], "RANK_IMG", []))) {
                echo "<dd class=\"profile-rank\">";
                if ( !$this->getAttribute($context["postrow"], "RANK_IMG", [])) {
                    echo "<div class=\"banner-rank\" style=\"background-color:";
                    echo $this->getAttribute($context["postrow"], "POST_AUTHOR_COLOUR", []);
                    echo "\">";
                    echo $this->getAttribute($context["postrow"], "RANK_TITLE", []);
                    echo "</div>";
                } else {
                    echo $this->getAttribute($context["postrow"], "RANK_TITLE", []);
                }
                if (($this->getAttribute($context["postrow"], "RANK_TITLE", []) && $this->getAttribute($context["postrow"], "RANK_IMG", []))) {
                    echo "<br />";
                }
                echo $this->getAttribute($context["postrow"], "RANK_IMG", []);
                echo "</dd>";
            }
            // line 175
            echo "\t\t\t";
            // line 176
            echo "
\t\t";
            // line 177
            if (($this->getAttribute($context["postrow"], "POSTER_POSTS", []) != "")) {
                echo "<dd class=\"profile-posts\"><strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong> ";
                if (($this->getAttribute($context["postrow"], "U_SEARCH", []) !== "")) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["postrow"], "U_SEARCH", []);
                    echo "\">";
                }
                echo $this->getAttribute($context["postrow"], "POSTER_POSTS", []);
                if (($this->getAttribute($context["postrow"], "U_SEARCH", []) !== "")) {
                    echo "</a>";
                }
                echo "</dd>";
            }
            // line 178
            echo "\t\t";
            if ($this->getAttribute($context["postrow"], "POSTER_JOINED", [])) {
                echo "<dd class=\"profile-joined\"><strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("JOINED");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong> ";
                echo $this->getAttribute($context["postrow"], "POSTER_JOINED", []);
                echo "</dd>";
            }
            // line 179
            echo "\t\t";
            if ($this->getAttribute($context["postrow"], "POSTER_WARNINGS", [])) {
                echo "<dd class=\"profile-warnings\"><strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WARNINGS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong> ";
                echo $this->getAttribute($context["postrow"], "POSTER_WARNINGS", []);
                echo "</dd>";
            }
            // line 180
            echo "
\t\t";
            // line 181
            if ($this->getAttribute($context["postrow"], "S_PROFILE_FIELD1", [])) {
                // line 182
                echo "\t\t\t<!-- Use a construct like this to include admin defined profile fields. Replace FIELD1 with the name of your field. -->
\t\t\t<dd><strong>";
                // line 183
                echo $this->getAttribute($context["postrow"], "PROFILE_FIELD1_NAME", []);
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong> ";
                echo $this->getAttribute($context["postrow"], "PROFILE_FIELD1_VALUE", []);
                echo "</dd>
\t\t";
            }
            // line 185
            echo "
\t\t";
            // line 186
            // line 187
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["postrow"], "custom_fields", []));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_fields"]) {
                // line 188
                echo "\t\t\t";
                if ( !$this->getAttribute($context["custom_fields"], "S_PROFILE_CONTACT", [])) {
                    // line 189
                    echo "\t\t\t\t<dd class=\"profile-custom-field profile-";
                    echo $this->getAttribute($context["custom_fields"], "PROFILE_FIELD_IDENT", []);
                    echo "\"><strong>";
                    echo $this->getAttribute($context["custom_fields"], "PROFILE_FIELD_NAME", []);
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong> ";
                    echo $this->getAttribute($context["custom_fields"], "PROFILE_FIELD_VALUE", []);
                    echo "</dd>
\t\t\t";
                }
                // line 191
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_fields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 192
            echo "\t\t";
            // line 193
            echo "
\t\t";
            // line 194
            // line 195
            echo "\t\t";
            if (( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null) && twig_length_filter($this->env, $this->getAttribute($context["postrow"], "contact", [])))) {
                // line 196
                echo "\t\t\t<dd class=\"profile-contact\">
\t\t\t\t<strong>";
                // line 197
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CONTACT");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong>
\t\t\t\t<div class=\"dropdown-container dropdown-left\">
\t\t\t\t\t<a href=\"#\" class=\"dropdown-trigger\" title=\"";
                // line 199
                echo $this->getAttribute($context["postrow"], "CONTACT_USER", []);
                echo "\">
\t\t\t\t\t\t<i class=\"icon fa-commenting-o fa-fw icon-lg\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 200
                echo $this->getAttribute($context["postrow"], "CONTACT_USER", []);
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t\t<div class=\"dropdown-contents contact-icons\">
\t\t\t\t\t\t\t";
                // line 205
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["postrow"], "contact", []));
                foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
                    // line 206
                    echo "\t\t\t\t\t\t\t\t";
                    $context["REMAINDER"] = ($this->getAttribute($context["contact"], "S_ROW_COUNT", []) % 4);
                    // line 207
                    echo "\t\t\t\t\t\t\t\t";
                    $value = (((isset($context["REMAINDER"]) ? $context["REMAINDER"] : null) == 3) || ($this->getAttribute($context["contact"], "S_LAST_ROW", []) && ($this->getAttribute($context["contact"], "S_NUM_ROWS", []) < 4)));
                    $context['definition']->set('S_LAST_CELL', $value);
                    // line 208
                    echo "\t\t\t\t\t\t\t\t";
                    if (((isset($context["REMAINDER"]) ? $context["REMAINDER"] : null) == 0)) {
                        // line 209
                        echo "\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 211
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                    if ($this->getAttribute($context["contact"], "U_CONTACT", [])) {
                        echo $this->getAttribute($context["contact"], "U_CONTACT", []);
                    } else {
                        echo $this->getAttribute($context["postrow"], "U_POST_AUTHOR", []);
                    }
                    echo "\" title=\"";
                    echo $this->getAttribute($context["contact"], "NAME", []);
                    echo "\"";
                    if ($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "S_LAST_CELL", [])) {
                        echo " class=\"last-cell\"";
                    }
                    if (($this->getAttribute($context["contact"], "ID", []) == "jabber")) {
                        echo " onclick=\"popup(this.href, 750, 320); return false;\"";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<span class=\"contact-icon ";
                    // line 212
                    echo $this->getAttribute($context["contact"], "ID", []);
                    echo "-icon\">";
                    echo $this->getAttribute($context["contact"], "NAME", []);
                    echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
                    // line 214
                    if ((((isset($context["REMAINDER"]) ? $context["REMAINDER"] : null) == 3) || $this->getAttribute($context["contact"], "S_LAST_ROW", []))) {
                        // line 215
                        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 217
                    echo "\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 218
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</dd>
\t\t";
            }
            // line 223
            echo "\t\t";
            // line 224
            echo "
\t\t</dl>

\t\t<div class=\"postbody\">
\t\t\t";
            // line 228
            if ($this->getAttribute($context["postrow"], "S_POST_HIDDEN", [])) {
                // line 229
                echo "\t\t\t\t";
                if ($this->getAttribute($context["postrow"], "S_POST_DELETED", [])) {
                    // line 230
                    echo "\t\t\t\t\t<div class=\"ignore\" id=\"post_hidden";
                    echo $this->getAttribute($context["postrow"], "POST_ID", []);
                    echo "\">
\t\t\t\t\t\t";
                    // line 231
                    echo $this->getAttribute($context["postrow"], "L_POST_DELETED_MESSAGE", []);
                    echo "<br />
\t\t\t\t\t\t";
                    // line 232
                    echo $this->getAttribute($context["postrow"], "L_POST_DISPLAY", []);
                    echo "
\t\t\t\t\t</div>
\t\t\t\t";
                } elseif ($this->getAttribute(                // line 234
$context["postrow"], "S_IGNORE_POST", [])) {
                    // line 235
                    echo "\t\t\t\t\t<div class=\"ignore\" id=\"post_hidden";
                    echo $this->getAttribute($context["postrow"], "POST_ID", []);
                    echo "\">
\t\t\t\t\t\t";
                    // line 236
                    echo $this->getAttribute($context["postrow"], "L_IGNORE_POST", []);
                    echo "<br />
\t\t\t\t\t\t";
                    // line 237
                    echo $this->getAttribute($context["postrow"], "L_POST_DISPLAY", []);
                    echo "
\t\t\t\t\t</div>
\t\t\t\t";
                }
                // line 240
                echo "\t\t\t";
            }
            // line 241
            echo "\t\t\t<div id=\"post_content";
            echo $this->getAttribute($context["postrow"], "POST_ID", []);
            echo "\"";
            if ($this->getAttribute($context["postrow"], "S_POST_HIDDEN", [])) {
                echo " style=\"display: none;\"";
            }
            echo ">

\t\t\t";
            // line 243
            // line 244
            echo "\t\t\t<h3 ";
            if ($this->getAttribute($context["postrow"], "S_FIRST_ROW", [])) {
                echo "class=\"first\"";
            }
            echo ">";
            if ($this->getAttribute($context["postrow"], "POST_ICON_IMG", [])) {
                echo "<img src=\"";
                echo (isset($context["T_ICONS_PATH"]) ? $context["T_ICONS_PATH"] : null);
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG", []);
                echo "\" width=\"";
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG_WIDTH", []);
                echo "\" height=\"";
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG_HEIGHT", []);
                echo "\" alt=\"";
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG_ALT", []);
                echo "\" title=\"";
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG_ALT", []);
                echo "\" /> ";
            }
            echo "<a href=\"#p";
            echo $this->getAttribute($context["postrow"], "POST_ID", []);
            echo "\">";
            echo $this->getAttribute($context["postrow"], "POST_SUBJECT", []);
            if ((isset($context["S_IS_LOCKED"]) ? $context["S_IS_LOCKED"] : null)) {
                echo " <i class=\"icon fa-lock fa-fw\" aria-hidden=\"true\"></i>";
            }
            echo "</a></h3>

\t\t";
            // line 246
            $value = ((((($this->getAttribute($context["postrow"], "U_EDIT", []) || $this->getAttribute($context["postrow"], "U_DELETE", [])) || $this->getAttribute($context["postrow"], "U_REPORT", [])) || $this->getAttribute($context["postrow"], "U_WARN", [])) || $this->getAttribute($context["postrow"], "U_INFO", [])) || $this->getAttribute($context["postrow"], "U_QUOTE", []));
            $context['definition']->set('SHOW_POST_BUTTONS', $value);
            // line 247
            echo "\t\t";
            // line 248
            echo "\t\t";
            if ( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) {
                // line 249
                echo "\t\t\t";
                if ($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SHOW_POST_BUTTONS", [])) {
                    // line 250
                    echo "\t\t\t\t<ul class=\"post-buttons\">
\t\t\t\t\t";
                    // line 251
                    // line 252
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_EDIT", [])) {
                        // line 253
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 254
                        echo $this->getAttribute($context["postrow"], "U_EDIT", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EDIT_POST");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-pencil fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 255
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_EDIT");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 259
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_DELETE", [])) {
                        // line 260
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 261
                        echo $this->getAttribute($context["postrow"], "U_DELETE", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_POST");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-times fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 262
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_DELETE");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 266
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_REPORT", [])) {
                        // line 267
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 268
                        echo $this->getAttribute($context["postrow"], "U_REPORT", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPORT_POST");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-exclamation fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 269
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_REPORT");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 273
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_WARN", [])) {
                        // line 274
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 275
                        echo $this->getAttribute($context["postrow"], "U_WARN", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WARN_USER");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-exclamation-triangle fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 276
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_WARN");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 280
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_INFO", [])) {
                        // line 281
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 282
                        echo $this->getAttribute($context["postrow"], "U_INFO", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("INFORMATION");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-info fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 283
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_INFORMATION");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 287
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_QUOTE", [])) {
                        // line 288
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 289
                        echo $this->getAttribute($context["postrow"], "U_QUOTE", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPLY_WITH_QUOTE");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-quote-left fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 290
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_QUOTE");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 294
                    echo "\t\t\t\t\t";
                    // line 295
                    echo "\t\t\t\t</ul>
\t\t\t";
                }
                // line 297
                echo "\t\t";
            }
            // line 298
            echo "\t\t";
            // line 299
            echo "
\t\t\t";
            // line 300
            // line 301
            echo "\t\t\t<p class=\"author\">
\t\t\t\t";
            // line 302
            if ((isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) {
                // line 303
                echo "\t\t\t\t\t<span><i class=\"icon fa-file fa-fw ";
                if ($this->getAttribute($context["postrow"], "S_UNREAD_POST", [])) {
                    echo "icon-red";
                } else {
                    echo "icon-lightgray";
                }
                echo " icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                echo $this->getAttribute($context["postrow"], "MINI_POST", []);
                echo "</span></span>
\t\t\t\t";
            } else {
                // line 305
                echo "\t\t\t\t\t<a class=\"unread\" href=\"";
                echo $this->getAttribute($context["postrow"], "U_MINI_POST", []);
                echo "\" title=\"";
                echo $this->getAttribute($context["postrow"], "MINI_POST", []);
                echo "\">
\t\t\t\t\t\t<i class=\"icon fa-file fa-fw ";
                // line 306
                if ($this->getAttribute($context["postrow"], "S_UNREAD_POST", [])) {
                    echo "icon-red";
                } else {
                    echo "icon-lightgray";
                }
                echo " icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                echo $this->getAttribute($context["postrow"], "MINI_POST", []);
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t";
            }
            // line 309
            echo "\t\t\t\t<span class=\"responsive-hide\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
            echo " <strong>";
            echo $this->getAttribute($context["postrow"], "POST_AUTHOR_FULL", []);
            echo "</strong> &raquo; </span>";
            echo $this->getAttribute($context["postrow"], "POST_DATE", []);
            echo "
\t\t\t</p>
\t\t\t";
            // line 311
            // line 312
            echo "
\t\t\t";
            // line 313
            if ($this->getAttribute($context["postrow"], "S_POST_UNAPPROVED", [])) {
                // line 314
                echo "\t\t\t<form method=\"post\" class=\"mcp_approve\" action=\"";
                echo $this->getAttribute($context["postrow"], "U_APPROVE_ACTION", []);
                echo "\">
\t\t\t\t<p class=\"post-notice unapproved\">
\t\t\t\t\t<span><i class=\"icon fa-question icon-red fa-fw\" aria-hidden=\"true\"></i></span>
\t\t\t\t\t<strong>";
                // line 317
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_UNAPPROVED_ACTION");
                echo "</strong>
\t\t\t\t\t<input class=\"button2\" type=\"submit\" value=\"";
                // line 318
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DISAPPROVE");
                echo "\" name=\"action[disapprove]\" />
\t\t\t\t\t<input class=\"button1\" type=\"submit\" value=\"";
                // line 319
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("APPROVE");
                echo "\" name=\"action[approve]\" />
\t\t\t\t\t<input type=\"hidden\" name=\"post_id_list[]\" value=\"";
                // line 320
                echo $this->getAttribute($context["postrow"], "POST_ID", []);
                echo "\" />
\t\t\t\t\t";
                // line 321
                echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
                echo "
\t\t\t\t</p>
\t\t\t</form>
\t\t\t";
            } elseif ($this->getAttribute(            // line 324
$context["postrow"], "S_POST_DELETED", [])) {
                // line 325
                echo "\t\t\t<form method=\"post\" class=\"mcp_approve\" action=\"";
                echo $this->getAttribute($context["postrow"], "U_APPROVE_ACTION", []);
                echo "\">
\t\t\t\t<p class=\"post-notice deleted\">
\t\t\t\t\t<span><i class=\"icon fa-recycle icon-green fa-fw\" aria-hidden=\"true\"></i></span>
\t\t\t\t\t<strong>";
                // line 328
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_DELETED_ACTION");
                echo "</strong>
\t\t\t\t\t";
                // line 329
                if ($this->getAttribute($context["postrow"], "S_DELETE_PERMANENT", [])) {
                    // line 330
                    echo "\t\t\t\t\t\t<input class=\"button2\" type=\"submit\" value=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE");
                    echo "\" name=\"action[delete]\" />
\t\t\t\t\t";
                }
                // line 332
                echo "\t\t\t\t\t<input class=\"button1\" type=\"submit\" value=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESTORE");
                echo "\" name=\"action[restore]\" />
\t\t\t\t\t<input type=\"hidden\" name=\"post_id_list[]\" value=\"";
                // line 333
                echo $this->getAttribute($context["postrow"], "POST_ID", []);
                echo "\" />
\t\t\t\t\t";
                // line 334
                echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
                echo "
\t\t\t\t</p>
\t\t\t</form>
\t\t\t";
            }
            // line 338
            echo "
\t\t\t";
            // line 339
            if ($this->getAttribute($context["postrow"], "S_POST_REPORTED", [])) {
                // line 340
                echo "\t\t\t<p class=\"post-notice reported\">
\t\t\t\t<a href=\"";
                // line 341
                echo $this->getAttribute($context["postrow"], "U_MCP_REPORT", []);
                echo "\"><i class=\"icon fa-exclamation fa-fw icon-red\" aria-hidden=\"true\"></i><strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_REPORTED");
                echo "</strong></a>
\t\t\t</p>
\t\t\t";
            }
            // line 344
            echo "
\t\t\t<div class=\"content\">";
            // line 345
            echo $this->getAttribute($context["postrow"], "MESSAGE", []);
            echo "</div>

\t\t\t";
            // line 347
            // line 348
            echo "
\t\t\t";
            // line 349
            if ($this->getAttribute($context["postrow"], "S_HAS_ATTACHMENTS", [])) {
                // line 350
                echo "\t\t\t\t<dl class=\"attachbox\">
\t\t\t\t\t<dt>
\t\t\t\t\t\t";
                // line 352
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ATTACHMENTS");
                echo "
\t\t\t\t\t</dt>
\t\t\t\t\t";
                // line 354
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["postrow"], "attachment", []));
                foreach ($context['_seq'] as $context["_key"] => $context["attachment"]) {
                    // line 355
                    echo "\t\t\t\t\t\t<dd>";
                    echo $this->getAttribute($context["attachment"], "DISPLAY_ATTACHMENT", []);
                    echo "</dd>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attachment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 357
                echo "\t\t\t\t</dl>
\t\t\t";
            }
            // line 359
            echo "
\t\t\t";
            // line 360
            // line 361
            echo "\t\t\t";
            if ($this->getAttribute($context["postrow"], "S_DISPLAY_NOTICE", [])) {
                echo "<div class=\"rules\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DOWNLOAD_NOTICE");
                echo "</div>";
            }
            // line 362
            echo "\t\t\t";
            if (($this->getAttribute($context["postrow"], "DELETED_MESSAGE", []) || $this->getAttribute($context["postrow"], "DELETE_REASON", []))) {
                // line 363
                echo "\t\t\t\t<div class=\"notice post_deleted_msg\">
\t\t\t\t\t";
                // line 364
                echo $this->getAttribute($context["postrow"], "DELETED_MESSAGE", []);
                echo "
\t\t\t\t\t";
                // line 365
                if ($this->getAttribute($context["postrow"], "DELETE_REASON", [])) {
                    echo "<br /><strong>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong> <em>";
                    echo $this->getAttribute($context["postrow"], "DELETE_REASON", []);
                    echo "</em>";
                }
                // line 366
                echo "\t\t\t\t</div>
\t\t\t";
            } elseif (($this->getAttribute(            // line 367
$context["postrow"], "EDITED_MESSAGE", []) || $this->getAttribute($context["postrow"], "EDIT_REASON", []))) {
                // line 368
                echo "\t\t\t\t<div class=\"notice\">
\t\t\t\t\t";
                // line 369
                echo $this->getAttribute($context["postrow"], "EDITED_MESSAGE", []);
                echo "
\t\t\t\t\t";
                // line 370
                if ($this->getAttribute($context["postrow"], "EDIT_REASON", [])) {
                    echo "<br /><strong>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong> <em>";
                    echo $this->getAttribute($context["postrow"], "EDIT_REASON", []);
                    echo "</em>";
                }
                // line 371
                echo "\t\t\t\t</div>
\t\t\t";
            }
            // line 373
            echo "
\t\t\t";
            // line 374
            if ($this->getAttribute($context["postrow"], "BUMPED_MESSAGE", [])) {
                echo "<div class=\"notice\"><br /><br />";
                echo $this->getAttribute($context["postrow"], "BUMPED_MESSAGE", []);
                echo "</div>";
            }
            // line 375
            echo "\t\t\t";
            // line 376
            echo "\t\t\t";
            if ($this->getAttribute($context["postrow"], "SIGNATURE", [])) {
                echo "<div id=\"sig";
                echo $this->getAttribute($context["postrow"], "POST_ID", []);
                echo "\" class=\"signature\">";
                echo $this->getAttribute($context["postrow"], "SIGNATURE", []);
                echo "</div>";
            }
            // line 377
            echo "
\t\t\t";
            // line 378
            // line 379
            echo "\t\t\t</div>

\t\t</div>

\t\t";
            // line 383
            // line 384
            echo "\t\t<div class=\"back2top\">
\t\t\t";
            // line 385
            // line 386
            echo "\t\t\t<a href=\"#top\" class=\"top\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BACK_TO_TOP");
            echo "\">
\t\t\t\t<i class=\"icon fa-chevron-circle-up fa-fw icon-gray\" aria-hidden=\"true\"></i>
\t\t\t\t<span class=\"sr-only\">";
            // line 388
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BACK_TO_TOP");
            echo "</span>
\t\t\t</a>
\t\t\t";
            // line 390
            // line 391
            echo "\t\t</div>
\t\t";
            // line 392
            // line 393
            echo "
\t\t</div>
\t</div>

\t<hr class=\"divider\" />
\t";
            // line 398
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['postrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 400
        echo "
";
        // line 401
        if ((isset($context["S_QUICK_REPLY"]) ? $context["S_QUICK_REPLY"] : null)) {
            // line 402
            echo "\t";
            $location = "quickreply_editor.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("quickreply_editor.html", "viewtopic_body.html", 402)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 404
        echo "
";
        // line 405
        // line 406
        echo "\t<div class=\"action-bar bar-bottom\">
\t";
        // line 407
        // line 408
        echo "
\t";
        // line 409
        if (( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null) && (isset($context["S_DISPLAY_REPLY_INFO"]) ? $context["S_DISPLAY_REPLY_INFO"] : null))) {
            // line 410
            echo "\t\t<a href=\"";
            echo (isset($context["U_POST_REPLY_TOPIC"]) ? $context["U_POST_REPLY_TOPIC"] : null);
            echo "\" class=\"button";
            if ((isset($context["S_IS_LOCKED"]) ? $context["S_IS_LOCKED"] : null)) {
                echo " locked-button";
            }
            echo "\" title=\"";
            if ((isset($context["S_IS_LOCKED"]) ? $context["S_IS_LOCKED"] : null)) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_LOCKED");
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_REPLY");
            }
            echo "\">
\t\t\t";
            // line 411
            if ((isset($context["S_IS_LOCKED"]) ? $context["S_IS_LOCKED"] : null)) {
                // line 412
                echo "\t\t\t\t<span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_TOPIC_LOCKED");
                echo "</span> <i class=\"icon fa-lock fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
            } else {
                // line 414
                echo "\t\t\t\t<span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_POST_REPLY");
                echo "</span> <i class=\"icon fa-reply fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
            }
            // line 416
            echo "\t\t</a>
\t";
        }
        // line 418
        echo "\t";
        // line 419
        echo "
\t";
        // line 420
        $location = "viewtopic_topic_tools.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("viewtopic_topic_tools.html", "viewtopic_body.html", 420)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 421
        echo "
\t";
        // line 422
        if (((((isset($context["S_NUM_POSTS"]) ? $context["S_NUM_POSTS"] : null) > 1) || twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination", []))) &&  !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null))) {
            // line 423
            echo "\t\t<form method=\"post\" action=\"";
            echo (isset($context["S_TOPIC_ACTION"]) ? $context["S_TOPIC_ACTION"] : null);
            echo "\">
\t\t";
            // line 424
            $location = "display_options.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("display_options.html", "viewtopic_body.html", 424)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 425
            echo "\t\t</form>
\t";
        }
        // line 427
        echo "
\t";
        // line 428
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "quickmod", []))) {
            // line 429
            echo "\t<div class=\"quickmod dropdown-container dropdown-container-left dropdown-up dropdown-";
            echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
            echo " dropdown-button-control\" id=\"quickmod\">
\t\t<span title=\"";
            // line 430
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("QUICK_MOD");
            echo "\" class=\"button button-secondary dropdown-trigger dropdown-select\">
\t\t\t<i class=\"icon fa-gavel fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 431
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("QUICK_MOD");
            echo "</span>
\t\t\t<span class=\"caret\"><i class=\"icon fa-sort-down fa-fw\" aria-hidden=\"true\"></i></span>
\t\t</span>
\t\t<div class=\"dropdown\">
\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t<ul class=\"dropdown-contents\">
\t\t\t\t";
            // line 437
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "quickmod", []));
            foreach ($context['_seq'] as $context["_key"] => $context["quickmod"]) {
                // line 438
                echo "\t\t\t\t\t";
                $value = twig_in_filter($this->getAttribute($context["quickmod"], "VALUE", []), [0 => "lock", 1 => "unlock", 2 => "delete_topic", 3 => "restore_topic", 4 => "make_normal", 5 => "make_sticky", 6 => "make_announce", 7 => "make_global"]);
                $context['definition']->set('QUICKMOD_AJAX', $value);
                // line 439
                echo "\t\t\t\t\t<li><a href=\"";
                echo $this->getAttribute($context["quickmod"], "LINK", []);
                echo "\"";
                if ($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "QUICKMOD_AJAX", [])) {
                    echo " data-ajax=\"true\" data-refresh=\"true\"";
                }
                echo ">";
                echo $this->getAttribute($context["quickmod"], "TITLE", []);
                echo "</a></li>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['quickmod'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 441
            echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 445
        echo "
\t";
        // line 446
        // line 447
        echo "
\t";
        // line 448
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination", [])) || (isset($context["TOTAL_POSTS"]) ? $context["TOTAL_POSTS"] : null))) {
            // line 449
            echo "\t\t<div class=\"pagination\">
\t\t\t";
            // line 450
            echo (isset($context["TOTAL_POSTS"]) ? $context["TOTAL_POSTS"] : null);
            echo "
\t\t\t";
            // line 451
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination", []))) {
                // line 452
                echo "\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "viewtopic_body.html", 452)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 453
                echo "\t\t\t";
            } else {
                // line 454
                echo "\t\t\t\t&bull; ";
                echo (isset($context["PAGE_NUMBER"]) ? $context["PAGE_NUMBER"] : null);
                echo "
\t\t\t";
            }
            // line 456
            echo "\t\t</div>
\t";
        }
        // line 458
        echo "</div>

";
        // line 460
        // line 461
        $location = "jumpbox.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("jumpbox.html", "viewtopic_body.html", 461)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 462
        echo "
";
        // line 463
        if (((isset($context["S_DISPLAY_ONLINE_LIST"]) ? $context["S_DISPLAY_ONLINE_LIST"] : null) && (isset($context["U_VIEWONLINE"]) ? $context["U_VIEWONLINE"] : null))) {
            // line 464
            echo "\t<div class=\"stat-block online-list\">
\t\t<h3><a href=\"";
            // line 465
            echo (isset($context["U_VIEWONLINE"]) ? $context["U_VIEWONLINE"] : null);
            echo "\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
            echo "</a></h3>
\t\t<p>";
            // line 466
            echo (isset($context["LOGGED_IN_USER_LIST"]) ? $context["LOGGED_IN_USER_LIST"] : null);
            echo "</p>
\t</div>
";
        }
        // line 469
        echo "
";
        // line 470
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "viewtopic_body.html", 470)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "viewtopic_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1644 => 470,  1641 => 469,  1635 => 466,  1629 => 465,  1626 => 464,  1624 => 463,  1621 => 462,  1609 => 461,  1608 => 460,  1604 => 458,  1600 => 456,  1594 => 454,  1591 => 453,  1578 => 452,  1576 => 451,  1572 => 450,  1569 => 449,  1567 => 448,  1564 => 447,  1563 => 446,  1560 => 445,  1554 => 441,  1539 => 439,  1535 => 438,  1531 => 437,  1522 => 431,  1518 => 430,  1513 => 429,  1511 => 428,  1508 => 427,  1504 => 425,  1492 => 424,  1487 => 423,  1485 => 422,  1482 => 421,  1470 => 420,  1467 => 419,  1465 => 418,  1461 => 416,  1455 => 414,  1449 => 412,  1447 => 411,  1432 => 410,  1430 => 409,  1427 => 408,  1426 => 407,  1423 => 406,  1422 => 405,  1419 => 404,  1405 => 402,  1403 => 401,  1400 => 400,  1395 => 398,  1388 => 393,  1387 => 392,  1384 => 391,  1383 => 390,  1378 => 388,  1372 => 386,  1371 => 385,  1368 => 384,  1367 => 383,  1361 => 379,  1360 => 378,  1357 => 377,  1348 => 376,  1346 => 375,  1340 => 374,  1337 => 373,  1333 => 371,  1324 => 370,  1320 => 369,  1317 => 368,  1315 => 367,  1312 => 366,  1303 => 365,  1299 => 364,  1296 => 363,  1293 => 362,  1286 => 361,  1285 => 360,  1282 => 359,  1278 => 357,  1269 => 355,  1265 => 354,  1260 => 352,  1256 => 350,  1254 => 349,  1251 => 348,  1250 => 347,  1245 => 345,  1242 => 344,  1234 => 341,  1231 => 340,  1229 => 339,  1226 => 338,  1219 => 334,  1215 => 333,  1210 => 332,  1204 => 330,  1202 => 329,  1198 => 328,  1191 => 325,  1189 => 324,  1183 => 321,  1179 => 320,  1175 => 319,  1171 => 318,  1167 => 317,  1160 => 314,  1158 => 313,  1155 => 312,  1154 => 311,  1144 => 309,  1132 => 306,  1125 => 305,  1113 => 303,  1111 => 302,  1108 => 301,  1107 => 300,  1104 => 299,  1102 => 298,  1099 => 297,  1095 => 295,  1093 => 294,  1086 => 290,  1080 => 289,  1077 => 288,  1074 => 287,  1067 => 283,  1061 => 282,  1058 => 281,  1055 => 280,  1048 => 276,  1042 => 275,  1039 => 274,  1036 => 273,  1029 => 269,  1023 => 268,  1020 => 267,  1017 => 266,  1010 => 262,  1004 => 261,  1001 => 260,  998 => 259,  991 => 255,  985 => 254,  982 => 253,  979 => 252,  978 => 251,  975 => 250,  972 => 249,  969 => 248,  967 => 247,  964 => 246,  934 => 244,  933 => 243,  923 => 241,  920 => 240,  914 => 237,  910 => 236,  905 => 235,  903 => 234,  898 => 232,  894 => 231,  889 => 230,  886 => 229,  884 => 228,  878 => 224,  876 => 223,  869 => 218,  863 => 217,  859 => 215,  857 => 214,  850 => 212,  832 => 211,  828 => 209,  825 => 208,  821 => 207,  818 => 206,  814 => 205,  806 => 200,  802 => 199,  796 => 197,  793 => 196,  790 => 195,  789 => 194,  786 => 193,  784 => 192,  778 => 191,  767 => 189,  764 => 188,  759 => 187,  758 => 186,  755 => 185,  747 => 183,  744 => 182,  742 => 181,  739 => 180,  729 => 179,  719 => 178,  702 => 177,  699 => 176,  697 => 175,  678 => 174,  677 => 173,  673 => 171,  671 => 170,  662 => 169,  661 => 168,  658 => 167,  656 => 166,  653 => 165,  640 => 164,  637 => 163,  636 => 162,  623 => 160,  609 => 159,  601 => 158,  576 => 155,  566 => 153,  563 => 152,  561 => 151,  557 => 150,  554 => 149,  553 => 148,  550 => 147,  541 => 141,  537 => 140,  530 => 136,  527 => 135,  519 => 132,  515 => 130,  513 => 129,  510 => 128,  504 => 125,  500 => 123,  498 => 122,  489 => 119,  482 => 117,  479 => 116,  473 => 115,  472 => 114,  459 => 112,  436 => 111,  410 => 110,  398 => 109,  378 => 108,  376 => 107,  372 => 106,  358 => 103,  354 => 102,  344 => 96,  342 => 95,  339 => 94,  338 => 93,  334 => 91,  332 => 90,  328 => 88,  322 => 86,  319 => 85,  306 => 84,  304 => 83,  300 => 82,  297 => 81,  295 => 80,  292 => 79,  284 => 74,  279 => 72,  273 => 71,  268 => 69,  264 => 68,  260 => 67,  255 => 65,  252 => 64,  250 => 63,  247 => 62,  245 => 61,  232 => 60,  231 => 59,  228 => 58,  224 => 56,  218 => 54,  212 => 52,  210 => 51,  195 => 50,  193 => 49,  190 => 48,  189 => 47,  185 => 45,  179 => 41,  174 => 39,  169 => 38,  161 => 36,  159 => 35,  150 => 32,  148 => 31,  145 => 30,  132 => 27,  129 => 26,  127 => 25,  124 => 24,  118 => 23,  115 => 22,  114 => 21,  105 => 20,  104 => 19,  101 => 18,  89 => 17,  86 => 16,  80 => 13,  67 => 9,  51 => 8,  48 => 7,  45 => 6,  37 => 4,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "viewtopic_body.html", "");
    }
}
