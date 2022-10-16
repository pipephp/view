<?php

use function Pipe\view;

it('sets the path for views', function () {
    expect(view())->toBeCallable();
});

it('thorws an error because file does not exist', function () {
    $render = view();
    $render("doesnotexist.no.php");
})->throws(\Exception::class, "The file doesnotexist.no.php could not be found.");

it('finds the file in path', function () {
    $render = view(__DIR__ . "/views");
    expect($render("file_exists.php"))->toEqual("yes");
});
