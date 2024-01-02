#include <stdio.h>

int main() {
    int A[12] = {60, 80, 55, 90, 75, 40, 50, 85, 70, 65, 45, 55};
    int B[12], C[12];
    int sum = 0, countB = 0, countC = 0;

    // Menghitung rata-rata nilai mahasiswa dari array A
    int i;
    for (  i = 0; i < 12; i++) {
        sum += A[i];
    }
    double average = (double)sum / 12;

    // Memindahkan nilai array A ke array B dan C
    int i2;
    for (  i2 = 0; i2 < 12; i2++) {
        if (A[i2] > average) {
            B[countB] = A[i2];
            countB++;
        } else {
            C[countC] = A[i2];
            countC++;
        }
    }

    // Menampilkan isi array A
    printf("Isi array A: ");
    int i3;
    for (  i3 = 0; i3 < 12; i3++) {
        printf("%d ", A[i3]);
    }

    // Menampilkan isi array B
    printf("\nIsi array B: ");
    int i4;
    for (  i4 = 0; i4 < countB; i4++) {
        printf("%d ", B[i4]);
    }

    // Menampilkan isi array C
    printf("\nIsi array C: ");
    int i5;
    for (  i5 = 0; i5 < countC; i5++) {
        printf("%d ", C[i5]);
    }

    printf("\n");
    return 0;
}
