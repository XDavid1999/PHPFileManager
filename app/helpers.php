<?php

function getParentDirectory($path)
{
	return join("/", array_slice(explode('/', $path), 0, count(explode('/', $path)) - 1));
}

function getLastChildFromPath($path)
{
	$array = explode('/', $path);
	return end($array);
}

function addParentDirectoryToArrayDirectories($directories, $currentDirectory)
{
	// Add first parent directory to array directories
	$parent = [
		'name' => '..',
		'path' => getParentDirectory($currentDirectory)
	];

	return array_merge([$parent], $directories);
}
