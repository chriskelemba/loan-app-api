<?php

namespace App\Http\Controllers;

use ChrisKelemba\ExcelImportLaravel\Support\ImportTableRegistry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportMaintenanceController extends Controller
{
    public function truncate(Request $request, ImportTableRegistry $registry): JsonResponse
    {
        $validated = $request->validate([
            'table' => ['required', 'string'],
        ]);

        $table = trim((string) ($validated['table'] ?? ''));

        if ($table === '' || !$registry->has($table)) {
            return response()->json([
                'message' => "Table '{$table}' is not importable.",
            ], 422);
        }

        DB::table($table)->truncate();

        return response()->json([
            'message' => "Table '{$table}' truncated successfully.",
            'data' => ['table' => $table],
        ]);
    }
}
