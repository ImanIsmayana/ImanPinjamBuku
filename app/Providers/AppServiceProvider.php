<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\member;
use App\Models\book;
use App\Models\borrowing;
use App\Models\category_book;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $category_id = null;
        $member_id = null;

        $member = null;


        $categorylist = category::all();
        $memberlist = member::all();
        $booklist = book::all();
        $book_categoryselected = category_book::all();
        $last_bookcode = book::latest('id')->first();

        $allborrowers = borrowing::where('status', '=', 2)->get();

        $latecharges = borrowing::where('status', '=', 3)->get();

        $member_name = DB::table('members')->where('id', '=', $member);

        view()->share('categorylist', $categorylist);
        view()->share('memberlist', $memberlist);
        view()->share('booklist', $booklist);
        view()->share('book_categoryselected', $book_categoryselected);
        view()->share('last_bookcode', $last_bookcode);

        view()->share('member_name', $member_name);
        view()->share('allborrowers', $allborrowers);
        view()->share('latecharges', $latecharges);
    }
}
