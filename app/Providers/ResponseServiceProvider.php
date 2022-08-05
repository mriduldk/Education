<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\ResponseFactory;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('success', function ($message = '', $dataName = '', $data = null) use ($factory) {
            $format = [
                'status' => 200,
                'message' => $message,
                'data' => [
                    $dataName => $data
                ]
            ];
            return $factory->make($format);
        });

        $factory->macro('successWithToken', function ($message = '', $dataName = '', $data = null, $token = null) use ($factory) {
            $format = [
                'status' => 200,
                'message' => $message,
                'data' => [
                    $dataName => $data
                ],
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ];
            return $factory->make($format);
        });



        $factory->macro('errorNotFound', function ($message = '') use ($factory) {
            $format = [
                'status' => 404,
                'message' => $message,
                'data' => [],
                'authorisation' => []
            ];
            return $factory->make($format);
        });

        $factory->macro('errorConflict', function ($message = '') use ($factory) {
            $format = [
                'status' => 409,
                'message' => $message,
                'data' => [],
                'authorisation' => []
            ];
            return $factory->make($format);
        });

        $factory->macro('errorUnauthorised', function ($message = '') use ($factory) {
            $format = [
                'status' => 401,
                'message' => $message,
                'data' => [],
                'authorisation' => []
            ];
            return $factory->make($format);
        });

        $factory->macro('errorAccessDenied', function ($message = '') use ($factory) {
            $format = [
                'status' => 403,
                'message' => $message,
                'data' => [],
                'authorisation' => []
            ];
            return $factory->make($format);
        });

        $factory->macro('errorBadRequest', function ($message = '') use ($factory) {
            $format = [
                'status' => 400,
                'message' => $message,
                'data' => [],
                'authorisation' => []
            ];
            return $factory->make($format);
        });

        $factory->macro('errorInternalServerError', function ($message = '') use ($factory) {
            $format = [
                'status' => 500,
                'message' => $message,
                'data' => [],
                'authorisation' => []
            ];
            return $factory->make($format);
        });
    }
}
