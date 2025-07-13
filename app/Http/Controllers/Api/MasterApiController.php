<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MasterApiController extends Controller
{
    public function handle(Request $request)
    {
        $validated = $request->validate([
            'table'  => 'required|string',
            'action' => 'required|string|in:add,update,delete,get',
            'params' => 'required|array',
        ]);

        $table  = $validated['table'];
        $action = strtolower($validated['action']);
        $params = $validated['params'];

        // Table whitelist check (recommended)
        $allowedTables = ['form_submissions', 'another_table'];  
        if (!in_array($table, $allowedTables)) {
            return response()->json(['status' => false, 'message' => 'Table not allowed.'], 403);
        }

        if (!Schema::hasTable($table)) {
            return response()->json(['status' => false, 'message' => 'Table not found.'], 404);
        }

        switch ($action) {
            case 'add':
                $id = DB::table($table)->insertGetId($params);
                return response()->json(['status' => true, 'id' => $id]);

            case 'update':
                if (empty($params['id'])) {
                    return response()->json(['status' => false, 'message' => 'ID is required for update.'], 400);
                }
                $id = $params['id'];
                unset($params['id']);
                $updated = DB::table($table)->where('id', $id)->update($params);
                return response()->json(['status' => $updated > 0]);

            case 'delete':
                if (empty($params['id'])) {
                    return response()->json(['status' => false, 'message' => 'ID is required for delete.'], 400);
                }
                $deleted = DB::table($table)->where('id', $params['id'])->delete();
                return response()->json(['status' => $deleted > 0]);

            case 'get':
                if (empty($params['id'])) {
                    return response()->json(['status' => false, 'message' => 'ID is required for get.'], 400);
                }
                $record = DB::table($table)->where('id', $params['id'])->first();
                return response()->json(['status' => true, 'data' => $record]);

            default:
                return response()->json(['status' => false, 'message' => 'Invalid action.'], 400);
        }
    }
}
