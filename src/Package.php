<?php

namespace Spatie\LaravelPackageTools;

use Illuminate\Support\Str;

class Package
{
    public string $name;

    public ?string $configFileName = null;

    public bool $hasViews = false;

    public array $migrationFileNames = [];

    public array $commands = [];

    public string $basePath;

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function hasConfigFile(string $configFileName = null): self
    {
        $this->configFileName = $configFileName ?? Str::after($this->name, 'laravel-');

        return $this;
    }

    public function hasViews(): self
    {
        $this->hasViews = true;

        return $this;
    }

    public function hasMigration(string $migrationFileName): self
    {
        $this->migrationFileNames[] = $migrationFileName;

        return $this;
    }

    public function hasCommand(string $commandClassName): self
    {
        $this->commands[] = $commandClassName;

        return $this;
    }

    public function hasCommands(array $commandClassNames): self
    {
        $this->commands = array_merge($this->commands, $commandClassNames);

        return $this;
    }

    public function basePath(string $directory = null): string
    {
        if ($directory === null) {
            return $this->basePath;
        }

        return $this->basePath . DIRECTORY_SEPARATOR . ltrim($directory, DIRECTORY_SEPARATOR);
    }

    public function setBasePath(string $path): self
    {
        $this->basePath = $path;

        return $this;
    }
}
