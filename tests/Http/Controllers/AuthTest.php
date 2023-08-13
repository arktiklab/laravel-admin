<?php

it('will verify login route')
    ->get('/~cp')
    ->assertOk()
    ->assertContent('<h1 class="bg-red-200">Login</h1>');
