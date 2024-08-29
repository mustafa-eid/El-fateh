<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Branch;
use App\Models\Category;
use App\Models\PreviousWork;
use App\Models\WhyUs;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search across models
        $aboutUsResults = AboutUs::where('en_company_name', 'LIKE', "%{$query}%")
            ->orWhere('ar_company_name', 'LIKE', "%{$query}%")
            ->orWhere('en_about_text', 'LIKE', "%{$query}%")
            ->orWhere('ar_about_text', 'LIKE', "%{$query}%")
            ->get();

        $articleResults = Article::where('en_title', 'LIKE', "%{$query}%")
            ->orWhere('ar_title', 'LIKE', "%{$query}%")
            ->orWhere('en_content', 'LIKE', "%{$query}%")
            ->orWhere('ar_content', 'LIKE', "%{$query}%")
            ->get();

        $articleCategoryResults = ArticleCategory::where('en_name', 'LIKE', "%{$query}%")
            ->orWhere('ar_name', 'LIKE', "%{$query}%")
            ->orWhere('en_content', 'LIKE', "%{$query}%")
            ->orWhere('ar_content', 'LIKE', "%{$query}%")
            ->get();

        $branchResults = Branch::where('en_name', 'LIKE', "%{$query}%")
            ->orWhere('ar_name', 'LIKE', "%{$query}%")
            ->orWhere('en_address', 'LIKE', "%{$query}%")
            ->orWhere('ar_address', 'LIKE', "%{$query}%")
            ->get();

        $categoryResults = Category::where('en_name', 'LIKE', "%{$query}%")
            ->orWhere('ar_name', 'LIKE', "%{$query}%")
            ->orWhere('en_content', 'LIKE', "%{$query}%")
            ->orWhere('ar_content', 'LIKE', "%{$query}%")
            ->get();

        $previousWorkResults = PreviousWork::where('en_title', 'LIKE', "%{$query}%")
            ->orWhere('ar_title', 'LIKE', "%{$query}%")
            ->orWhere('en_engineer_name', 'LIKE', "%{$query}%")
            ->orWhere('ar_engineer_name', 'LIKE', "%{$query}%")
            ->orWhere('en_description', 'LIKE', "%{$query}%")
            ->orWhere('ar_description', 'LIKE', "%{$query}%")
            ->orWhere('en_location', 'LIKE', "%{$query}%")
            ->orWhere('ar_location', 'LIKE', "%{$query}%")
            ->orWhere('en_client', 'LIKE', "%{$query}%")
            ->orWhere('ar_client', 'LIKE', "%{$query}%")
            ->get();

        $whyUsResults = WhyUs::where('en_title', 'LIKE', "%{$query}%")
            ->orWhere('ar_title', 'LIKE', "%{$query}%")
            ->orWhere('en_content', 'LIKE', "%{$query}%")
            ->orWhere('ar_content', 'LIKE', "%{$query}%")
            ->get();

        // Concatenate results
        $results = collect([]);
        $results = $results->concat($aboutUsResults);
        $results = $results->concat($articleResults);
        $results = $results->concat($articleCategoryResults);
        $results = $results->concat($branchResults);
        $results = $results->concat($categoryResults);
        $results = $results->concat($previousWorkResults);
        $results = $results->concat($whyUsResults);

        return view('website.search.index', compact('results', 'query'));
    }
}
