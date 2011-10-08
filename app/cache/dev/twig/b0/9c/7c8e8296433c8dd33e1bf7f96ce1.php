<?php

/* IgaKongressBundle::layout.html.twig */
class __TwigTemplate_b09c7c8e8296433c8dd33e1bf7f96ce1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'extra' => array($this, 'block_extra'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<html>
    <head>
        <title>";
        // line 3
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
";
        // line 4
        $this->displayBlock('extra', $context, $blocks);
        // line 5
        echo "
    </head>

    <body>
";
        // line 9
        $this->displayBlock('content', $context, $blocks);
        // line 10
        echo "    </body>

</html>";
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Kongress.in";
    }

    // line 4
    public function block_extra($context, array $blocks = array())
    {
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        echo "Kongress.content";
    }

    public function getTemplateName()
    {
        return "IgaKongressBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
