<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\CategoryModel;
use App\MyHelpers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use ImageHandlerTrait;

    /**
     * @param CategoryRequest $request
     */
    public function categoryCreate(CategoryRequest $request){
        // validate
        $data = $request->validated();

        // handling the image
        $data['category_image'] = $this->handleRequestImage($request->file('category_image'), 'uploads/images/category');
        $data['category_slug'] = $this->getCategorySlug($data['category_name']);

        // insert
        if (CategoryModel::insert($data))
            return response(['msg' => 'Categoria aggiunta con successo '], 200);
        else
            return redirect('categories')->with('error', 'Qualcosa è andato storto, riprova.');
    }

    /**
     * @param string $categoryName
     * @return array|string|string[]
     */
    private function getCategorySlug(string $categoryName){
        return str_replace(' ', '-', strtolower(trim($categoryName)));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function categoryRemove(Request $request){
        try {
            $category = CategoryModel::findOrFail($request->id);
            MyHelpers::deleteImageFromStorage($category->category_image , 'uploads/images/category/');
            if ($category->delete())
                return redirect()->route('category')->with('success', 'Categoria rimossa con successo.');
            else
                return redirect('categories')->with('error', 'Qualcosa è andato storto, riprova.');
        }catch (ModelNotFoundException $exception){
            return redirect('categories')->with('error', 'Qualcosa è andato storto, riprova.');
        }
    }

    /**
     * @param CategoryRequest $request
     */
    public function categoryUpdate(CategoryRequest $request){
        // validation
        $data = $request->validated();

        // get the current category ( which being updated )
        try {
            $category = CategoryModel::findOrFail($request->get('category_id'));
        }catch (ModelNotFoundException $exception){
            return redirect()->route('admin-category')->with('error', 'Qualcosa è andato storto, riprova.');
        }

        // handling if the request has an image
        $newImage = $request->file('category_image');
        if ($newImage)
        {

            $data['category_image'] = $this->handleRequestImage($newImage, 'uploads/images/category');
            MyHelpers::deleteImageFromStorage($category->category_image, 'uploads/images/category/');
        }

        // update
        $data['category_slug'] = $this->getCategorySlug($data['category_name']);
        if ($category->update($data))
            return response(['msg' => 'Categoria aggiornata con successo.'], 200);
        else
            return redirect()->route('admin-category')->with('error', 'Qualcosa è andato storto, riprova.');
    }
}
