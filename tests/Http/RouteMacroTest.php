<?php

it('will verify test route defined by macro')
    ->get('/~cp/test')
    ->assertOk()
    ->assertSee('working');
