<?php

function getParentDirectory($path)
{
	return join("/", array_slice(explode('/', $path), 0, count(explode('/', $path)) - 1));
}
