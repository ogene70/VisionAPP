<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class LoginRequest extends FormRequest
{
 public function authorize(): bool { return true; }
 public function rules(): array {
 return [
 'email' => 'required|string|email',
 'password' => 'required|string'
 ];
 }
 public function failedValidation(Validator $validator) {
 throw new HttpResponseException(response()->json([
 'status' => 0,
 'message' => $validator->errors()
 ]));
 }}