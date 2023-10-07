#include<stdio.h>

int main(){
	int n;
	printf("masukan angka: ");
	scanf("%d", &n);
	
	if(n > 50){
		n += 10; 
}   else {
	 n -=25;
}
	printf("nilai akhir : %d\n", n);
	
	return 0;
}

