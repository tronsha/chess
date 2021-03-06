<?php

$header = <<<'EOF'
Copyright (C) 2015 - 2017 Stefan Hüsges
EOF;

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules(array(
        '@PSR2' => true,
        'combine_consecutive_unsets' => true,
        'function_typehint_space' => true,
        'header_comment' => array('header' => $header),
        'include' => true,
        'method_separation' => true,
        'no_alias_functions' => true,
        'no_empty_statement' => true,
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'no_unused_imports' => true,
        'no_useless_return' => true,
        'no_short_echo_tag' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'php_unit_construct' => true,
        'php_unit_dedicate_assert' => true,
        'php_unit_strict' => true,
        'no_mixed_echo_print' => ['use' => 'echo'],
        'array_syntax' => ['syntax' => 'short'],
        'single_quote' => true,
        'standardize_not_equals' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'whitespace_after_comma_in_array' => true,
        'concat_space' => ['spacing' => 'one'],
    ))
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('vendor')
            ->in(__DIR__)
    )
    ;
