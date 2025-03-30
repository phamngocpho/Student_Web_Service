package com.example.studentwebservice

import androidx.compose.runtime.State
import androidx.compose.runtime.mutableStateOf
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import kotlinx.coroutines.launch

class StudentViewModel : ViewModel() {
    private val _students = mutableStateOf<List<Student>>(emptyList())
    val students: State<List<Student>> get() = _students

    init {
        fetchStudents()
    }

    private fun fetchStudents() {
        viewModelScope.launch {
            try {
                val studentList = RetrofitClient.api.getStudents()
                _students.value = studentList
            } catch (e: Exception) {
                e.printStackTrace()
            }
        }
    }
}
