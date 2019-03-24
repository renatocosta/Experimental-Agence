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
            // Buyer
            \Backoffice\Buyers\Application\Command\CreateBuyerCommand::class => \Backoffice\Buyers\Application\Command\Handler\CreateBuyerCommandHandler::class,
            \Backoffice\Buyers\Application\Command\UpdateBuyerCommand::class => \Backoffice\Buyers\Application\Command\Handler\UpdateBuyerCommandHandler::class,

            // Transactions
            \Backoffice\Transactions\Application\Command\CreateTransactionCommand::class => \Backoffice\Transactions\Application\Command\Handler\CreateTransactionCommandHandler::class,
            \Backoffice\Payments\Application\Command\CreateCreditCardTransactionCommand::class => \Backoffice\Payments\Application\Command\Handler\CreateCreditCardTransactionCommandHandler::class,            
            \Backoffice\Payments\Application\Command\CreateSlipTransactionCommand::class => \Backoffice\Payments\Application\Command\Handler\CreateSlipTransactionCommandHandler::class,                        
            \Backoffice\Transactions\Application\Command\QueryTransactionCommand::class => \Backoffice\Transactions\Application\Command\Handler\QueryTransactionsCommandHandler::class,
            \Backoffice\Payments\Application\Command\QueryCreditCardTransactionCommand::class => \Backoffice\Payments\Application\Command\Handler\QueryCreditCardTransactionCommandHandler::class,
            \Backoffice\Payments\Application\Command\QuerySlipTransactionCommand::class => \Backoffice\Payments\Application\Command\Handler\QuerySlipTransactionCommandHandler::class                                  
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