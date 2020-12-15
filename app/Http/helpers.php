<?php

function setActiveRoute($name)
{
    return request()->routeIs($name) ? 'nav-link active' : 'nav-link';
}

function setOpenMenu($name)
{
    return request()->routeIs($name) ? 'nav-item menu-open' : 'nav-item';
}
