<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Models\User;

final class ClearCommandTest extends TestCase
{
    /**
     * @expectedException \RuntimeException
     */
    public function testModelIsRequired(): void
    {
        $this->artisan('scout:clear')->run();
    }

    public function testClearsIndex(): void
    {
        $this->mockIndex($class = User::class)->expects('clear')->once();

        $this->artisan('scout:clear', ['model' => User::class])->expectsOutput("The [{$class}] index have been cleared.");
    }
}