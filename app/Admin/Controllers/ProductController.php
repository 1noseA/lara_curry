<?php

namespace App\Admin\Controllers;

use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', 'ID');
        $grid->column('name', '商品名');
        $grid->column('price', '値段');
        $grid->column('text', '商品説明');
        $grid->column('hot', '辛さ');
        $grid->column('category', 'カテゴリー');
        $grid->column('image', '画像');
        $grid->column('created_at', '登録日時');
        $grid->column('updated_at', '更新日時');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', '商品名');
        $show->field('price', '値段');
        $show->field('text', '商品説明');
        $show->field('hot', '辛さ');
        $show->field('category', 'カテゴリー');
        $show->field('image', '画像');
        $show->field('created_at', '登録日時');
        $show->field('updated_at', '更新日時');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('name', '商品名');
        $form->number('price', '値段');
        $form->text('text', '商品名');
        $form->number('hot', '辛さ')->default(1);
        $form->number('category', 'カテゴリー');
        $form->image('image', '画像');

        return $form;
    }
}
