<?php

namespace App\DataTables;

use App\Models\Car;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CarsDataTable extends DataTable
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
            ->addColumn('action', function (){
                return '<a href="javascript:void(0)" class="btn btn-info btn-xs">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-primary btn-xs">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-xs">
                            <i class="fas fa-trash">
                        </a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Car $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Car $model)
    {

        return $model->allowed()->newQuery();

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('cars-table')
            ->pageLength(10)
            ->columns($this->getColumns())
            ->lengthMenu([[10, 25, 50, 100, -1],[10, 25, 50, 100, 'All']])
            ->minifiedAjax()
            ->dom("<'row'<'col-md-6'B><'col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i ><'col-sm-12 col-md-7'p>>")
            ->orderBy(1)
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
            Column::make('brand'),
            Column::make('model'),
            Column::make('details'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
        return 'Cars_' . date('YmdHis');
    }
}
