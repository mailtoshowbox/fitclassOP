<?php

/* mail/forgotten.twig */
class __TwigTemplate_a308fd66423a4a77043dace54d95079600c1dd0f06e4329df5b9707b7a548ed8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo (isset($context["text_greeting"]) ? $context["text_greeting"] : null);
        // line 3
        echo (isset($context["text_change"]) ? $context["text_change"] : null);
        // line 5
        echo (isset($context["reset"]) ? $context["reset"] : null);
        // line 7
        echo (isset($context["text_ip"]) ? $context["text_ip"] : null);
        // line 9
        echo (isset($context["ip"]) ? $context["ip"] : null);
    }

    public function getTemplateName()
    {
        return "mail/forgotten.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 9,  25 => 7,  23 => 5,  21 => 3,  19 => 1,);
    }
}
/* {{ text_greeting }}*/
/* */
/* {{ text_change }}*/
/* */
/* {{ reset }}*/
/* */
/* {{ text_ip }} */
/* */
/* {{ ip }}*/
