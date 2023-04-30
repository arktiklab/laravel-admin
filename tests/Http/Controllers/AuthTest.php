<?php

it('will verify login route')
    ->get('/~cp')
    ->assertOk()
    ->assertSee('ok');
