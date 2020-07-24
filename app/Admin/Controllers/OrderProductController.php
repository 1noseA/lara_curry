<?php

namespace App\Admin\Controllers;

use App\OrderProduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrderProduct';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderProduct());

        $grid->column('id', 'ID');
        $grid->column('order_id', '注文id');
        $grid->column('product_id', '商品id');
        $grid->column('quantity', '数量');
        $grid->column('price', '小計');
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(OrderProduct::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('order_id', '注文id');
        $show->field('product_id', '商品id');
        $show->field('quantity', '数量');
        $show->field('price', '小計');
        // $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderProduct());

        $form->number('order_id', '注文id');
        $form->number('product_id', '商品id');
        $form->number('quantity', '数量');
        $form->number('price', '小計');

        return $form;
    }
}
