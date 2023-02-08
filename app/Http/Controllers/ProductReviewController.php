<?php

namespace App\Http\Controllers;

use App\Jobs\FetchProductJob;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductReviewController extends Controller
{
    public function index()
    {
        return response([
            "message" => "Success",
            "reviews" => ProductReview::all(),
        ]);
    }

    public function reset()
    {
        ProductReview::query()->delete();
        return response([
            "message" => "Success",
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "product_id" => "required|string",
            "author_id" => "required|string",
            "rating" => "required|integer",
            "title" => "required|string|min:3",
            "description" => "required|string|min:10",
        ]);

        if ($validator->fails()) {
            return response([
                "message" => "Validation failed",
                "errors" => $validator->errors(),
            ], 400);
        }

        $review = ProductReview::query()->create([
            "product_id" => $request->product_id,
            "author_id" => $request->author_id,
            "title" => $request->title,
            "description" => $request->description,
            "rating" => $request->rating,
        ]);

        return response([
            "message" => "Created product review",
            "review" => $review,
        ]);
    }

    public function show($id)
    {
        $review = ProductReview::query()->find($id);

        if (!$review) {
            return response([
                "message" => "Could not find product review with requested id"
            ], 400);
        }

        return response([
            "message" => "Success",
            "review" => $review,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "title" => "string",
            "description" => "string",
            "rating" => "integer",
        ]);

        if ($validator->fails()) {
            return response([
                "message" => "Validation failed",
                "errors" => $validator->errors(),
            ], 400);
        }

        $review = ProductReview::query()->find($id);

        if (!$review) {
            return response([
                "message" => "Could not find product review with requested id"
            ], 400);
        }

        $review->update($request->all());

        return response([
            "message" => "Updated",
            "review" => $review,
        ]);
    }

    public function destroy($id)
    {
        ProductReview::destroy($id);

        return response([
            "message" => "Deleted product review " . $id,
        ]);
    }

    public function productReviews(Request $request, $id)
    {
        $reviews = ProductReview::query()->where("product_id", $id)->get();

        return response([
            "message" => "Success",
            "reviews" => $reviews,
        ]);
    }
}
