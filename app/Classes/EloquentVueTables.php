<?php

namespace App\Classes;

use Carbon\Carbon;

Class EloquentVueTables implements VueTablesInterface {
    public function get( $model, Array $fields ) {
        $byColumn     = request( 'byColumn' );
        $limit        = request( 'limit' );
        $page         = request( 'page' );
        $ascending    = request( 'ascending' );
        $orderBy      = request( 'orderBy' );
        $query        = json_decode( request( 'query' ), true );
        $data         = $model->select( $fields );

        // Comprobar si se esta haciendo una consulta
        if ( isset( $query ) && $query ) {
            $data = $byColumn == 1 ? $this->filterByColumn( $data, $query ) : $this->filter( $data, $query, $field);
        }

        $count = $data->count();

        $data->limit( $limit )->skip( $limit * ( $page - 1) );

        // Comprobar si se envia order by
        if ( isset( $orderBy ) ):
            $direction = $ascending == 1 ? "ASC" : "DESC";
            $data->orderBy( $orderBy, $direction );
        endif;

        $results = $data->get()->toArray();

        //retornar resultado
        return [
            'data' => $results,
            'count' => $count
        ];
    }

    protected function filterByColumn( $data, $query ) {
        foreach ( $query as $field => $query ):
            if ( ! $query ) {
                continue;
            }

            if ( is_string( $query ) ) {
                $data->where( $field, 'LIKE', "%{$query}%" );
            } else {
                $start = Carbon::createFromFormat( 'Y-m-d', $query['start'] )->startOfDay();
                $end   = Carbon::createFromFormat( 'Y-m-d', $query['end'] )->endOfDay();
                $data->whereBetween( $field, [ $start, $end ] );
            }
        endforeach;
    }

    // Recibir datos enviados desde el cliente
    protected function filter( $data, $query, $fields ) {
        foreach ( $fields as $index => $fields ):
            $method = $index ? "orWhere" : "where";
            $data->{$method}( $field, 'LIKE', "%{$query}%" );
        endforeach;

        return $data;
    }
}