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

/* forumlist_body.html */
class __TwigTemplate_5d816f09a8e31c41aaac425a35bbf9e1a41a67aecf3e7b5fab8950a77b9af47f extends \Twig\Template
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
        echo "
";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "forumrow", []));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["forumrow"]) {
            // line 3
            echo "\t";
            if ((($this->getAttribute($context["forumrow"], "S_IS_CAT", []) &&  !$this->getAttribute($context["forumrow"], "S_FIRST_ROW", [])) || $this->getAttribute($context["forumrow"], "S_NO_CAT", []))) {
                // line 4
                echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t";
            }
            // line 9
            echo "
\t";
            // line 10
            // line 11
            echo "\t";
            if ((($this->getAttribute($context["forumrow"], "S_IS_CAT", []) || $this->getAttribute($context["forumrow"], "S_FIRST_ROW", [])) || $this->getAttribute($context["forumrow"], "S_NO_CAT", []))) {
                // line 12
                echo "\t\t<div class=\"forabg category-";
                echo $this->getAttribute($context["forumrow"], "FORUM_ID", []);
                echo "\" data-hide-description=\"";
                echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "SHOW_FORUM_DESC", []);
                echo "\">
\t\t\t<div class=\"inner\">
\t\t\t<ul class=\"topiclist";
                // line 14
                if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "STANDARD_FORUMS_LAYOUT", []) == 0)) {
                    echo " two-long-columns";
                }
                echo "\">
\t\t\t\t<li class=\"header\">
\t\t\t\t\t";
                // line 16
                // line 17
                echo "\t\t\t\t\t<dl class=\"row-item\">
\t\t\t\t\t\t<dt><div class=\"list-inner\">";
                // line 18
                if ($this->getAttribute($context["forumrow"], "S_IS_CAT", [])) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", []);
                    echo "\" data-id=\"";
                    echo $this->getAttribute($context["forumrow"], "FORUM_ID", []);
                    echo "\">";
                    echo $this->getAttribute($context["forumrow"], "FORUM_NAME", []);
                    echo "</a>";
                } else {
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM");
                }
                echo "</div></dt>
\t\t\t\t\t\t";
                // line 19
                if ($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "STANDARD_FORUMS_LAYOUT", [])) {
                    // line 20
                    echo "\t\t\t\t\t\t<dd class=\"topics\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPICS");
                    echo "</dd>
\t\t\t\t\t\t<dd class=\"posts\">";
                    // line 21
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTS");
                    echo "</dd>
\t\t\t\t\t\t";
                }
                // line 23
                echo "\t\t\t\t\t\t<dd class=\"lastpost\"><span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LAST_POST");
                echo "</span></dd>
\t\t\t\t\t</dl>
\t\t\t\t\t";
                // line 25
                // line 26
                echo "\t\t\t\t</li>
\t\t\t</ul>
\t\t\t<ul class=\"topiclist forums";
                // line 28
                if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "STANDARD_FORUMS_LAYOUT", []) == 0)) {
                    echo " two-long-columns";
                }
                echo " forum-";
                echo $this->getAttribute($context["forumrow"], "FORUM_ID", []);
                echo "\">
\t";
            }
            // line 30
            echo "\t";
            // line 31
            echo "
\t";
            // line 32
            if ( !$this->getAttribute($context["forumrow"], "S_IS_CAT", [])) {
                // line 33
                echo "\t\t";
                // line 34
                echo "\t\t<li class=\"row\">
\t\t\t";
                // line 35
                // line 36
                echo "\t\t\t";
                ob_start();
                // line 37
                echo "\t\t\t";
                if (((($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "STANDARD_FORUMS_LAYOUT", []) == 0) &&  !$this->getAttribute($context["forumrow"], "CLICKS", [])) &&  !$this->getAttribute($context["forumrow"], "S_IS_LINK", []))) {
                    // line 38
                    echo "\t\t\t\t<div class=\"forum-statistics\">
\t\t\t\t\t<span class=\"dfn\">";
                    // line 39
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPICS");
                    echo "</span>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " <span class=\"value\">";
                    echo $this->getAttribute($context["forumrow"], "TOPICS", []);
                    echo "</span><span class=\"comma\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COMMA_SEPARATOR");
                    echo "</span>
\t\t\t\t\t<span class=\"dfn\">";
                    // line 40
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTS");
                    echo "</span>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " <span class=\"value\">";
                    echo $this->getAttribute($context["forumrow"], "POSTS", []);
                    echo "</span>
\t\t\t\t</div>
\t\t\t";
                }
                // line 43
                echo "\t\t\t";
                $value = ('' === $value = ob_get_clean()) ? '' : new \Twig_Markup($value, $this->env->getCharset());
                $context['definition']->set('EXTRA_DESC', $value);
                // line 44
                echo "\t\t\t<dl class=\"row-item ";
                echo $this->getAttribute($context["forumrow"], "FORUM_IMG_STYLE", []);
                echo "\">
\t\t\t\t<dt title=\"";
                // line 45
                echo $this->getAttribute($context["forumrow"], "FORUM_FOLDER_IMG_ALT", []);
                echo "\">
\t\t\t\t\t";
                // line 46
                if ($this->getAttribute($context["forumrow"], "S_UNREAD_FORUM", [])) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", []);
                    echo "\" class=\"row-item-link\"></a>";
                }
                // line 47
                echo "\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t";
                // line 48
                if (((isset($context["S_ENABLE_FEEDS"]) ? $context["S_ENABLE_FEEDS"] : null) && $this->getAttribute($context["forumrow"], "S_FEED_ENABLED", []))) {
                    // line 49
                    echo "\t\t\t\t\t\t\t<a class=\"feed-icon-forum\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FEED");
                    echo " - ";
                    echo $this->getAttribute($context["forumrow"], "FORUM_NAME", []);
                    echo "\" href=\"";
                    echo (isset($context["U_FEED"]) ? $context["U_FEED"] : null);
                    echo "?f=";
                    echo $this->getAttribute($context["forumrow"], "FORUM_ID", []);
                    echo "\">
\t\t\t\t\t\t\t\t\t<i class=\"icon fa-rss-square fa-fw icon-orange\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                    // line 50
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FEED");
                    echo " - ";
                    echo $this->getAttribute($context["forumrow"], "FORUM_NAME", []);
                    echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                }
                // line 53
                echo "\t\t\t\t\t\t";
                if ($this->getAttribute($context["forumrow"], "FORUM_IMAGE", [])) {
                    // line 54
                    echo "\t\t\t\t\t\t\t";
                    // line 55
                    echo "\t\t\t\t\t\t\t<span class=\"forum-image\">";
                    echo $this->getAttribute($context["forumrow"], "FORUM_IMAGE", []);
                    echo "</span>
\t\t\t\t\t\t\t";
                    // line 56
                    // line 57
                    echo "\t\t\t\t\t\t";
                }
                // line 58
                echo "\t\t\t\t\t\t<a href=\"";
                echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", []);
                echo "\" class=\"forumtitle\" data-id=\"";
                echo $this->getAttribute($context["forumrow"], "FORUM_ID", []);
                echo "\">";
                echo $this->getAttribute($context["forumrow"], "FORUM_NAME", []);
                echo "</a>
\t\t\t\t\t\t";
                // line 59
                if ($this->getAttribute($context["forumrow"], "FORUM_DESC", [])) {
                    echo "<span class=\"forum-desc\">";
                    echo $this->getAttribute($context["forumrow"], "FORUM_DESC", []);
                    echo "</span>";
                }
                // line 60
                echo "\t\t\t\t\t\t";
                echo $this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "EXTRA_DESC", []);
                echo "
\t\t\t\t\t\t";
                // line 61
                if ($this->getAttribute($context["forumrow"], "MODERATORS", [])) {
                    // line 62
                    echo "\t\t\t\t\t\t\t<div class=\"forum-mods\"><strong>";
                    echo $this->getAttribute($context["forumrow"], "L_MODERATOR_STR", []);
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong> ";
                    echo $this->getAttribute($context["forumrow"], "MODERATORS", []);
                    echo "</div>
\t\t\t\t\t\t";
                }
                // line 64
                echo "\t\t\t\t\t\t";
                if ((twig_length_filter($this->env, $this->getAttribute($context["forumrow"], "subforum", [])) && $this->getAttribute($context["forumrow"], "S_LIST_SUBFORUMS", []))) {
                    // line 65
                    echo "\t\t\t\t\t\t\t";
                    // line 66
                    echo "\t\t\t\t\t\t\t<div class=\"forum-subs\">
\t\t\t\t\t\t\t\t<strong>";
                    // line 67
                    echo $this->getAttribute($context["forumrow"], "L_SUBFORUM_STR", []);
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong>
\t\t\t\t\t\t\t";
                    // line 68
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["forumrow"], "subforum", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["subforum"]) {
                        // line 69
                        echo "\t\t\t\t\t\t\t\t";
                        // line 70
                        echo "\t\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["subforum"], "U_SUBFORUM", []);
                        echo "\" class=\"subforum";
                        if ($this->getAttribute($context["subforum"], "S_UNREAD", [])) {
                            echo " unread";
                        } else {
                            echo " read";
                        }
                        echo "\" title=\"";
                        if ($this->getAttribute($context["subforum"], "S_UNREAD", [])) {
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNREAD_POSTS");
                        } else {
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_UNREAD_POSTS");
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t<i class=\"icon ";
                        // line 71
                        if ($this->getAttribute($context["subforum"], "IS_LINK", [])) {
                            echo "fa-external-link";
                        } else {
                            echo "fa-file-o";
                        }
                        echo " fa-fw ";
                        if ($this->getAttribute($context["subforum"], "S_UNREAD", [])) {
                            echo " icon-red";
                        } else {
                            echo " icon-blue";
                        }
                        echo " icon-md\" aria-hidden=\"true\"></i>";
                        echo $this->getAttribute($context["subforum"], "SUBFORUM_NAME", []);
                        echo "</a>";
                        if ( !$this->getAttribute($context["subforum"], "S_LAST_ROW", [])) {
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COMMA_SEPARATOR");
                        }
                        // line 72
                        echo "\t\t\t\t\t\t\t\t";
                        // line 73
                        echo "\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subforum'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 74
                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    // line 75
                    // line 76
                    echo "\t\t\t\t\t\t";
                }
                // line 77
                echo "
\t\t\t\t\t\t";
                // line 78
                if ( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) {
                    // line 79
                    echo "\t\t\t\t\t\t\t";
                    if (($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "EXTRA_DESC", []) != 1)) {
                        // line 80
                        echo "\t\t\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t\t\t";
                        // line 81
                        if ($this->getAttribute($context["forumrow"], "CLICKS", [])) {
                            // line 82
                            echo "\t\t\t\t\t\t\t\t\t\t";
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REDIRECTS");
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                            echo " <strong>";
                            echo $this->getAttribute($context["forumrow"], "CLICKS", []);
                            echo "</strong>
\t\t\t\t\t\t\t\t\t";
                        } elseif (( !$this->getAttribute(                        // line 83
$context["forumrow"], "S_IS_LINK", []) && $this->getAttribute($context["forumrow"], "TOPICS", []))) {
                            // line 84
                            echo "\t\t\t\t\t\t\t\t\t\t";
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPICS");
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                            echo " <strong>";
                            echo $this->getAttribute($context["forumrow"], "TOPICS", []);
                            echo "</strong>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 86
                        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    // line 88
                    echo "
\t\t\t\t\t\t\t";
                    // line 89
                    if (( !$this->getAttribute($context["forumrow"], "S_IS_LINK", []) && $this->getAttribute($context["forumrow"], "LAST_POST_TIME", []))) {
                        // line 90
                        echo "\t\t\t\t\t\t\t\t<div class=\"forum-lastpost\" style=\"display: none;\">
\t\t\t\t\t\t\t\t\t<span><strong>";
                        // line 91
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LAST_POST");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo "</strong> <a href=\"";
                        echo $this->getAttribute($context["forumrow"], "U_LAST_POST", []);
                        echo "\" title=\"";
                        echo $this->getAttribute($context["forumrow"], "LAST_POST_SUBJECT", []);
                        echo "\" class=\"lastsubject\">";
                        echo $this->getAttribute($context["forumrow"], "LAST_POST_SUBJECT_TRUNCATED", []);
                        echo "</a></span>
\t\t\t\t\t\t\t\t\t|
\t\t\t\t\t\t\t\t\t<span>";
                        // line 93
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
                        echo " ";
                        echo $this->getAttribute($context["forumrow"], "LAST_POSTER_FULL", []);
                        echo " &laquo; ";
                        echo $this->getAttribute($context["forumrow"], "LAST_POST_TIME", []);
                        echo "</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    // line 96
                    echo "\t\t\t\t\t\t";
                }
                // line 97
                echo "\t\t\t\t\t</div>
\t\t\t\t</dt>
\t\t\t\t";
                // line 99
                if ($this->getAttribute($context["forumrow"], "CLICKS", [])) {
                    // line 100
                    echo "\t\t\t\t\t<dd class=\"redirect\"><span>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REDIRECTS");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " ";
                    echo $this->getAttribute($context["forumrow"], "CLICKS", []);
                    echo "</span></dd>
\t\t\t\t";
                } elseif ( !$this->getAttribute(                // line 101
$context["forumrow"], "S_IS_LINK", [])) {
                    // line 102
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute((isset($context["definition"]) ? $context["definition"] : null), "STANDARD_FORUMS_LAYOUT", [])) {
                        // line 103
                        echo "\t\t\t\t\t<dd class=\"topics\">";
                        echo $this->getAttribute($context["forumrow"], "TOPICS", []);
                        echo " <dfn>";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPICS");
                        echo "</dfn></dd>
\t\t\t\t\t<dd class=\"posts\">";
                        // line 104
                        echo $this->getAttribute($context["forumrow"], "POSTS", []);
                        echo " <dfn>";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTS");
                        echo "</dfn></dd>
\t\t\t\t\t";
                    }
                    // line 106
                    echo "\t\t\t\t\t<dd class=\"lastpost\">
\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t";
                    // line 108
                    if ($this->getAttribute($context["forumrow"], "U_UNAPPROVED_TOPICS", [])) {
                        // line 109
                        echo "\t\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["forumrow"], "U_UNAPPROVED_TOPICS", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPICS_UNAPPROVED");
                        echo "\">
\t\t\t\t\t\t\t\t\t<i class=\"icon fa-question fa-fw icon-blue\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 110
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPICS_UNAPPROVED");
                        echo "</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t";
                    } elseif ($this->getAttribute(                    // line 112
$context["forumrow"], "U_UNAPPROVED_POSTS", [])) {
                        // line 113
                        echo "\t\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["forumrow"], "U_UNAPPROVED_POSTS", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTS_UNAPPROVED_FORUM");
                        echo "\">
\t\t\t\t\t\t\t\t\t<i class=\"icon fa-question fa-fw icon-blue\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 114
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTS_UNAPPROVED_FORUM");
                        echo "</span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t";
                    }
                    // line 117
                    echo "\t\t\t\t\t\t\t";
                    if ($this->getAttribute($context["forumrow"], "LAST_POST_TIME", [])) {
                        // line 118
                        echo "\t\t\t\t\t\t\t\t<dfn>";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LAST_POST");
                        echo "</dfn>
\t\t\t\t\t\t\t\t";
                        // line 119
                        if ($this->getAttribute($context["forumrow"], "S_DISPLAY_SUBJECT", [])) {
                            // line 120
                            echo "\t\t\t\t\t\t\t\t\t";
                            // line 121
                            echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["forumrow"], "U_LAST_POST", []);
                            echo "\" title=\"";
                            echo $this->getAttribute($context["forumrow"], "LAST_POST_SUBJECT", []);
                            echo "\" class=\"lastsubject\">";
                            echo $this->getAttribute($context["forumrow"], "LAST_POST_SUBJECT_TRUNCATED", []);
                            echo "</a> <br />
\t\t\t\t\t\t\t\t";
                        }
                        // line 123
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
                        echo " ";
                        echo $this->getAttribute($context["forumrow"], "LAST_POSTER_FULL", []);
                        // line 124
                        echo "\t\t\t\t\t\t\t\t";
                        if ( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) {
                            // line 125
                            echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["forumrow"], "U_LAST_POST", []);
                            echo "\" title=\"";
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_LATEST_POST");
                            echo "\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-external-link-square fa-fw icon-lightgray icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                            // line 126
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_LATEST_POST");
                            echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
                        }
                        // line 129
                        echo "\t\t\t\t\t\t\t\t<br />";
                        echo $this->getAttribute($context["forumrow"], "LAST_POST_TIME", []);
                        echo "
\t\t\t\t\t\t\t";
                    } else {
                        // line 131
                        echo "\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["forumrow"], "U_UNAPPROVED_TOPICS", [])) {
                            // line 132
                            echo "\t\t\t\t\t\t\t\t\t";
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_UNAPPROVED_FORUM", $this->getAttribute($context["forumrow"], "TOPICS", []));
                            echo "
\t\t\t\t\t\t\t\t";
                        } else {
                            // line 134
                            echo "\t\t\t\t\t\t\t\t\t";
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_POSTS");
                            echo "
\t\t\t\t\t\t\t\t";
                        }
                        // line 136
                        echo "\t\t\t\t\t\t\t";
                    }
                    // line 137
                    echo "\t\t\t\t\t\t</span>
\t\t\t\t\t</dd>
\t\t\t\t";
                } else {
                    // line 140
                    echo "\t\t\t\t\t<dd>&nbsp;</dd>
\t\t\t\t";
                }
                // line 142
                echo "\t\t\t</dl>
\t\t\t";
                // line 143
                // line 144
                echo "\t\t</li>
\t\t";
                // line 145
                // line 146
                echo "\t";
            }
            // line 147
            echo "
\t";
            // line 148
            if ($this->getAttribute($context["forumrow"], "S_LAST_ROW", [])) {
                // line 149
                echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t";
                // line 153
                // line 154
                echo "\t";
            }
            // line 155
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 157
            echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t<strong>";
            // line 159
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_FORUMS");
            echo "</strong>
\t\t</div>
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['forumrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forumlist_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  566 => 159,  562 => 157,  556 => 155,  553 => 154,  552 => 153,  546 => 149,  544 => 148,  541 => 147,  538 => 146,  537 => 145,  534 => 144,  533 => 143,  530 => 142,  526 => 140,  521 => 137,  518 => 136,  512 => 134,  506 => 132,  503 => 131,  497 => 129,  491 => 126,  484 => 125,  481 => 124,  476 => 123,  466 => 121,  464 => 120,  462 => 119,  457 => 118,  454 => 117,  448 => 114,  441 => 113,  439 => 112,  434 => 110,  427 => 109,  425 => 108,  421 => 106,  414 => 104,  407 => 103,  404 => 102,  402 => 101,  394 => 100,  392 => 99,  388 => 97,  385 => 96,  375 => 93,  363 => 91,  360 => 90,  358 => 89,  355 => 88,  351 => 86,  342 => 84,  340 => 83,  332 => 82,  330 => 81,  327 => 80,  324 => 79,  322 => 78,  319 => 77,  316 => 76,  315 => 75,  312 => 74,  306 => 73,  304 => 72,  286 => 71,  269 => 70,  267 => 69,  263 => 68,  258 => 67,  255 => 66,  253 => 65,  250 => 64,  241 => 62,  239 => 61,  234 => 60,  228 => 59,  219 => 58,  216 => 57,  215 => 56,  210 => 55,  208 => 54,  205 => 53,  197 => 50,  186 => 49,  184 => 48,  181 => 47,  175 => 46,  171 => 45,  166 => 44,  162 => 43,  152 => 40,  142 => 39,  139 => 38,  136 => 37,  133 => 36,  132 => 35,  129 => 34,  127 => 33,  125 => 32,  122 => 31,  120 => 30,  111 => 28,  107 => 26,  106 => 25,  100 => 23,  95 => 21,  90 => 20,  88 => 19,  74 => 18,  71 => 17,  70 => 16,  63 => 14,  55 => 12,  52 => 11,  51 => 10,  48 => 9,  41 => 4,  38 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "forumlist_body.html", "");
    }
}
