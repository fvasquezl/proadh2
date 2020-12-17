<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('roles',function ($data){
                return $data->getRoleNames()->implode(', ');
            })
            ->addColumn('action',function ($data){
                return $this->getActionColumn($data);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $user)
    {
        return $user->allowed()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
            ->pageLength(10)
            ->columns($this->getColumns())
            ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']])
            ->minifiedAjax()
            ->dom("<'row'<'col-md-6'B><'col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i ><'col-sm-12 col-md-7'p>>")
            ->orderBy(0,'desc')

            ->buttons(
                Button::make('excel')
                    ->addClass('btn-success')
                    ->text('<i class="fas fa-file-excel"></i> Excel')
                    ->init("$(node).removeClass('btn-secondary buttons-html5 buttons-excel')"),
                Button::make('csv')->addClass('btn-info')
                    ->text('<i class="fas fa-file-csv"></i> CSV'),
                Button::make('print'),
                Button::make('pageLength')
                    ->addClass('dropdown-toggle btn-block'),
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('username'),
            Column::make('email'),
            Column::make('roles'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }


    public function getActionColumn($data):string
    {
        $showUrl = route('admin.users.show', $data->id);
        $editUrl = route('admin.users.edit', $data->id);
        $deleteUrl = route('admin.users.destroy', $data->id);
        $csrf = csrf_field();
        $method_delete = method_field('DELETE');

        return "<a data-value='$data->id' href='$showUrl' class='btn btn-info btn-xs'>
                    <i class='far fa-eye'></i>
                 </a>
                 <a data-value='$data->id' href='$editUrl' class='btn btn-primary btn-xs'>
                    <i class='fas fa-pen'></i>
                 </a>
                  <form action='$deleteUrl'
                        method='POST'
                        style='display:inline'>
                        {$csrf}{$method_delete}
                        <button class='btn btn-xs btn-danger'>
                            <i class='fas fa-trash-alt'></i>
                        </button>
                  </form>
                ";
    }
}
