<?php

namespace App\Admin\Controllers;

use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', 'ID');
        $grid->column('user_id', 'ユーザーid');
        $grid->column('tel', '電話番号');
        $grid->column('date', '受け取り日');
        $grid->column('time', '受け取り時間');
        $grid->column('name', '受け取り者');
        $grid->column('total', '合計金額');
        $grid->column('created_at', '注文日時');
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('user_id', 'ユーザーid');
        $show->field('tel', '電話番号');
        $show->field('date', '受け取り日');
        $show->field('time', '受け取り時間');
        $show->field('name', '受け取り者');
        $show->field('total', '合計金額');
        $show->field('created_at', '注文日時');
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
        $form = new Form(new Order());

        $form->number('user_id', 'ユーザーid');
        $form->text('tel', '電話番号');
        $form->text('date', '受け取り日');
        $form->text('time', '受け取り時間');
        $form->text('name', '受け取り者');
        $form->number('total', '合計金額');

        return $form;
    }
}
