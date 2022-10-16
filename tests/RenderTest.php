<?php

use function Pipe\view;

it('renders a view without params', function () {
    $render = view(__DIR__ . "/views");
    expect($render("file_exists.php"))->toEqual("yes");
});

it('renders a view with params', function () {
    $render = view(__DIR__ . "/views");
    $world = "World";
    expect($render("params_simple.php", ["world" => $world]))->toEqual("Hello, World!");
});

it('renders template with simple element', function () {
    $render = view(__DIR__ . "/views");
    $world = "World";
    expect($render("render_simple_element.php", ["world" => $world]))->toEqual("SE: simple element");
});

it('renders template with parameterized element', function () {
    $render = view(__DIR__ . "/views");
    $world = "World";
    expect($render("render_params_element.php", ["world" => $world]))->toEqual("SE: Params element -> World");
});
