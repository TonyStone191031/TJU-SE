function [] = Mapof4color()
%UNTITLED �˴���ʾ�йش˺�����ժҪ
%   �û�ָ����ʡ��ɫse,se��ȡ1,2,3,4�ĸ�ֵ,1�Ǻ�ɫ��2����ɫ��3����ɫ��4�ǻ�ɫ
mapin=shaperead('ʡ��_region.shp');
map=shaperead('ʡ��_region.shp');
map=Transfer( mapin,map );
N=length(map); %�й���ͼ��������ʡ��������ͬ����������������
A=zeros(N); %A���ڽӾ��󣬴洢��ʡ�ı߽������Ϣ����ʼ��ʱȫ����ֵ
for i=1:N %��ȡ��ͼ��Ϣ������ڽӾ���
    shapei=[map(i).X(:),map(i).Y(:)];
    for j=(i+1):N
        shapej=[map(j).X(:),map(j).Y(:)];
        if size(intersect(shapei,shapej,'rows'),1)>=1 %ͨ��intersect�����ж���ʡ֮���Ƿ���ڹ�ͬ��
            A(i,j)=1;
            A(j,i)=1; %����ʡ���ڹ�ͬ�㣬���ڽӾ������ӦԪ�ظ�Ϊ1
        end
    end
end

%����Ҫ��
A(32,33)=1;A(33,32)=1; %�涨������̨�岻����ʹ��һ����ɫ
A(34,29)=1;A(29,34)=1; %�涨�㶫�뺣�ϲ�����ʹ��һ����ɫ
A(30,31)=1;A(31,30)=1; %�涨�������Ų�����ʹ��һ����ɫ

disp('��ѡ����ɫ����ɫ������1������ɫ������2������ɫ������3������ɫ������4��');
se=input('������ɫ��');

disp('ѡ��ʹ�á������ͼ����ʽ(��������1)�����ǡ��������뽻��ʽ����������2����;ע�⣺�����ϣ��ѡ����ţ������ʹ�õڶ��ַ�����');
choice=input('��ѡ��ʽ��');
switch choice
    case 1
       geoshow('ʡ��_region.shp');
       [x0,y0]=ginput(1); 
       for i=1:N+1 
           for j=(i+1):N+1 
               [in,~]=inpolygon(x0,y0,map(i).X(:),map(i).Y(:));
               if(in==1) 
                   prov=i; 
               end
           end
       end
    case 2
        char sheng;
        sheng=input('����ʡ��ȫ�ƻ��ƣ���������������߼���Ӣ���ַ�������,лл����');
        prov=Choice2(sheng);
end

color=zeros(1,N);
color(prov)=se; 
fag=0; 
k=1;
while(k<=N&&k>=1)
    if(k==prov&&fag==0) 
        k=k+1; 
        if(k>N)
            break; 
        end
    elseif(k==prov&&fag==1) 
        k=k-1; 
    end
    if(fag==0) 
        i=1;col=1;
        while(i<=N) 
            if(A(k,i)==1&&col==color(i)) 
                col=col+1;i=0; 
            end
            if(col>4) 
                break;
            end
            i=i+1;
        end
    else
        i=1;col=color(k)+1;
        while(i<=N) 
            if(A(k,i)==1&&col==color(i)) 
                col=col+1;i=0; 
            end
            if(col>4) 
                break;
            end
            i=i+1;
        end
    end
    if(col==5)
        k=k-1; 
        fag=1; 
    else
        color(k)=col;fag=0;k=k+1; 
    end
end

for i=1:N
    if(color(i)==0)
        color(i)=5; 
    end
end

colour=[1,0,0;0,1,0;0,0,1;1,1,0;0,1,1]; %���ӵ�������ɫ����ɫ����������ɫ��ʾ�ĳ����޷�ʵ����ɫʱ���������ʡ����ɫ
figure;
hold on
for i=1:N
    index=find(isnan(map(i).X));
    start=1;
    for j=1:length(index)
        fill(map(i).X(start:(index(j)-1)),map(i).Y(start:(index(j)-1)),colour(color(i),:));
        start=index(j)+1;
    end
end

end

