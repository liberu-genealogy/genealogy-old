<?php

if (! function_exists('crud_index')) {
    function crud_index($request, $crud) {
        $rows = [];
        $query = $crud->query();

        if ($searchTerm = $request->searchTerm) {
            $columnsToSearch = collect($crud->getFillable());

            $columnsToSearch->each(
                function ($column) use ($query, $searchTerm) {
                    $query->orWhere($column, 'like', "%$searchTerm%");
                }
            );
        }

        if ($request->has('columnFilters')) {
            $filters = get_object_vars(json_decode($request->columnFilters));

            foreach ($filters as $key => $value) {
                if (!empty($value)) {
                    $query->orWhere($key, 'like', '%' . $value . '%');
                }
            }
        }

        if ($request->has('sort.0')) {
            $sort = json_decode($request->sort[0]);
            $query->orderBy($sort->field, $sort->type);
        }

        if ($request->has('perPage')) {
            $rows = $query->paginate($request->perPage);
        }

        return $rows;

    }
}
