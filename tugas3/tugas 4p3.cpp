#include <stdio.h>
//if (A % 2 == 0): Ini adalah bagian dari kondisi if. Ini menguji apakah hasil dari operasi modulo A % 2 sama dengan 0.
// Operasi modulo (%) mengembalikan sisa dari pembagian A dengan 2. Jika sisa pembagian sama dengan 0, itu berarti A adalah bilangan genap,
// karena bilangan genap dapat dibagi oleh 2 tanpa sisa.

//{ printf("BILANGAN GENAP\n"); }: Jika kondisi dalam if bernilai benar (A adalah bilangan genap), maka pernyataan di dalam kurung kurawal ini akan dieksekusi.
// Dalam hal ini, akan mencetak "BILANGAN GENAP" ke layar.

//else: Ini adalah bagian dari kondisi else. Jika kondisi dalam if bernilai salah (A adalah bilangan ganjil), maka pernyataan di bawah else akan dieksekusi.

//printf("BILANGAN GANJIL\n");: Ini adalah pernyataan yang akan dieksekusi jika A adalah bilangan ganjil. Dalam hal ini, akan mencetak "BILANGAN GANJIL" ke layar.
//Jadi, keseluruhan kode ini akan mencetak "BILANGAN GENAP" jika A adalah bilangan genap, dan akan mencetak "BILANGAN GANJIL" jika A adalah bilangan ganjil.
// Ini adalah cara sederhana untuk memeriksa sifat bilangan dalam bahasa pemrograman C.
int main()
{
	int A;
	printf("imput bilangan bulat:");
	scanf("%i", &A);

	if(A %2==0){ 
		printf("BILANGAN GENAP\n");
	} else 
		printf("BILANGAN GANJIL\n");
	return 0;
}
