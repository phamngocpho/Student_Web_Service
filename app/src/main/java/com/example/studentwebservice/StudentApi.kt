package com.example.studentwebservice

import retrofit2.http.GET

interface StudentApi {
    @GET("display.php")
    suspend fun getStudents(): List<Student>
}
