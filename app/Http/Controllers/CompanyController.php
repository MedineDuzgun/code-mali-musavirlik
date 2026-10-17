<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Yeni şirket (mükellef) kaydı.
     * Doğrulama başarısızsa 422, başarılı kayıtta 201 döner.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tax_number' => ['required', 'string', 'regex:/^[0-9]{10,11}$/', 'unique:companies,tax_number'],
            'company_type' => ['required', 'in:sahis,limited,anonim'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'city' => ['nullable', 'string', 'max:100'],
        ]);

        $company = Company::create($data);

        return response()->json([
            'message' => 'Şirket kaydı oluşturuldu.',
            'data' => $company,
        ], 201);
    }
}
