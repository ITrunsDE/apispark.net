<?php

namespace App\Http\Livewire;

use App\Models\Repository;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class VerifyRepository extends Component
{
    public Repository $repository;

    public bool $send_verify_token;

    public string $verification_token;

    public function render(): View
    {
        return view('livewire.verify-repository');
    }

    public function send_token(): void
    {
        // save the repository
        $this->repository->save();

        // send the verification token
        $response = $this->repository->send_verification();

        // check the response of the token
        if (is_string($response)) {
            Notification::make()
                ->title(title: 'Verification send failed!')
                ->body(body: $response)
                ->danger()
                ->send();
        } else {
            Notification::make()
                ->title(title: 'Verification send successful!')
                ->body(body: 'Please check your ingest for the verification token!')
                ->success()
                ->send();

            $this->send_verify_token = true;
        }
    }

    public function verify_token(): void
    {
        if ($this->repository->verification_token === $this->verification_token) {
            $this->repository->update(['verified_at' => now()]);
            Notification::make()
                ->title(title: 'Verification successful!')
                ->body(body: 'Your repository is now active.')
                ->success()
                ->send();
            $this->verification_token = '';
        } else {
            Notification::make()
                ->title(title: 'Verification not successful!')
                ->body(body: 'Your verification token is invalid.')
                ->warning()
                ->send();

            $this->verification_token = '';
        }
    }
}
