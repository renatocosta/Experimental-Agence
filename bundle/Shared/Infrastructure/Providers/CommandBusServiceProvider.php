<?php

namespace Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Shared\Application\CommandBus;
use Shared\Application\SimpleCommandBus;

class CommandBusServiceProvider extends ServiceProvider
{
    private function mappings(): array
    {
        return [
            // Consultant
            \Backoffice\Consultant\Application\Command\QueryConsultantCommand::class => \Backoffice\Consultant\Application\Command\Handler\QueryConsultantCommandHandler::class,
        ];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var CommandBus $commandBus */
        $commandBus = $this->app->make(CommandBus::class);

        foreach ($this->mappings() as $command => $handler) {
            if (!is_array($handler)) {
                $commandBus->subscribe($command, $handler);
            } else {
                foreach ($handler as $h) {
                    $commandBus->subscribe($command, $h);
                }
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CommandBus::class, SimpleCommandBus::class);
    }
    
}