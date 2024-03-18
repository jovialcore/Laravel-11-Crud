<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketRequest;
use App\Http\Resources\marketResource;
use App\Models\Marketing;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketingController extends Controller
{
    use ApiResponse;

    // CRUD --Read
    public function listMarketingChannels(): JsonResponse
    {
        try {

            $marketingChannels = Marketing::all();

            if ($marketingChannels->isNotEmpty()) {

                $data = MarketResource::collection($marketingChannels);

                return $this->success(data: $data, message: 'Marketing list generated successfully');
            }

            return $this->notFound(message: 'No marketing channels found');
        } catch (\Throwable $th) {
            $this->serverError(message: $th->getMessage());
        }
    }

    // CRUD --Create
    public function createMarketChannels(MarketRequest $request): JsonResponse
    {
        try {

            $data = $request->only('name', 'description');

            $createMarket = Marketing::create($data);

            if ($createMarket) {
                return $this->success(message: 'Market successfully created');
            }
        } catch (\Throwable $th) {
            $this->serverError(message: $th->getMessage());
        }
    }

    // CRUD --Read
    public function showMarketingChannel($marketingId)
    {
        try {
            $marketingChannel =  Marketing::find($marketingId);

            if ($marketingChannel) {

                $data = new marketResource($marketingChannel);

                return $this->success(data: $data, message: 'Successful');
            }
            return $this->notFound(message: "We don't have any result for this marketing channel");
        } catch (\Throwable $th) {
            return $this->serverError(message: $th->getMessage());
        }
    }

    // CRUD --Update
    public function updateMarketingChannel(MarketRequest $request, $marketChannelId): JsonResponse
    {

        try {
            $marketingChannel = Marketing::Find($marketChannelId);
            if ($marketingChannel) {
                $marketingChannel->update($request->only('name', 'description'));

                return $this->success(message: 'Channel Has been updated successfully');
            }
            return $this->error(message: 'Couldn\'t find  marketing channel ');
        } catch (\Throwable $th) {
            return $this->serverError(message: $th->getMessage());
        }
    }


    //CRUD -- Delete

    public function deleteMarketingChannel($marketChannelId)
    {
        try {

            $marketingChannel = Marketing::find($marketChannelId);

            if ($marketingChannel) {

                $marketingChannel->delete();

                return $this->success(message: 'Marketing channel Deleted successfully');
            }
            return $this->error(message: 'Couldn\'t find  marketing channel ');
        } catch (\Throwable $th) {
            return $this->serverError(message: $th->getMessage());
        }
    }
}
