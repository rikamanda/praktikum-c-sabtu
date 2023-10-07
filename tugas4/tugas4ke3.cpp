#include<stdio.h>

int main(){
	int n;
	printf("masukan angka: ");
	scanf("%d", &n);
	
	if(n > 50){
		n += 10; 
		 n -=25;
		 	printf("nilai akhir : %d\n", n);
}   else {
	printf("rusak");
}

	
	return 0;
}

